<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .res ul {
            margin: 0;
            padding: 10px;
            list-style: none;
            display: flex;
            flex-direction: column;
        }

        .res ul a {
            text-decoration: none;
            display: block;
            color: #000;
            padding: 5px;
        }

        .res ul a:hover {
            background: #d3d3d3;
        }

        .res {
            width: calc(100% - 65%);
            position: absolute;
            background: #f4f4f4;
            border-radius: 3px;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        @if (session('msg'))
            <div class="alert alert-{{ session('type') ?? 'info' }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- @session('success')
            <div class="alert alert-success">
                {{ $value }}
            </div>
        @endsession --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-4">Courses List</h1>
            <div>
                <a href="{{ route('courses.trash') }}" class="btn btn-danger">Trashed Course</a>
                <a href="{{ route('courses.create') }}" class="btn btn-primary">Create New Course</a>

            </div>

        </div>
        <form action="{{ route('courses.index') }}" method="GET" class="my-3">
            <div class="row">
                <div class="col-md-6" style="position: relative">
                    <input type="text" name="search" class="form-control search-input"
                        value="{{ request('search') }}" placeholder="Search by title, content and price...">
                </div>

                <div class="col-md-2">
                    <select name="sort" class="form-select">
                        <option value="" selected disabled>Sort By</option>
                        <option @selected(request('sort') == 'title') value="title">Title</option>
                        <option @selected(request('sort') == 'hours') value="hours">Hours</option>
                        <option @selected(request('sort') == 'price') value="price">Price</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="order" class="form-select">
                        <option value="" selected disabled>Order By</option>
                        <option @selected(request('order') == 'asc') value="asc">ASC</option>
                        <option @selected(request('order') == 'desc') value="desc">DESC</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>

        </form>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Image</th>
                    <th style="width: 30%">Title</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <th>Lessons Count</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($course->image) }}" alt="{{ $course->title }}" width="60"></td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->hours }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->lessons_count }}</td>
                        <td>{{ $course->created_at->format('Y-m-d H:i:s a') }}</td>
                        <td>{{ $course->updated_at->diffForHumans() }}</td>
                        <td>
                            <div class="btn-group">
                                     <a href="{{ route('courses.lessons.create',$course->id ) }}" class="btn btn-sm btn-info"><i
                                        class="fas fa-plus"></i></a>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-success"><i
                                        class="fas fa-eye"></i></a>

                                <a href="{{ route('courses.edit', $course->id ) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                {{-- <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> --}}
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure ?!')" type="submit"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="9" class="text-center">No courses available.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $courses->appends($_GET)->links() }}
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script>
    let input = document.querySelector('.search-input');
    input.onkeyup = () => {
        fetch('/courses/search?search=' + input.value)
            .then(res => res.json())
            .then(data => {
                console.log(data);
            })
    }
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>

</html>
