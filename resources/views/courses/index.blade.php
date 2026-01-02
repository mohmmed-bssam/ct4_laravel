<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Courses List</h1>
        <form action="{{ route('courses.index') }}" method="GET" class="my-3">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="query" class="form-control"
                        placeholder="Search by title, content and price...">
                </div>
                <div class="col-md-2">
                    <select name="sort" class="form-select">
                        <option value="" selected disabled>Sort By</option>
                        <option value="title">Title</option>
                        <option value="hour">Hours</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="order" class="form-select">
                        <option value="" selected disabled>Order By</option>
                        <option value="asc">ASC</option>
                        <option value="desc">DESC</option>
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
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td><img src="{{ asset('images/' . $course->image) }}" alt="{{ $course->title }}"
                                width="60"></td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->hours }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->created_at }}</td>
                        <td>{{ $course->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </div>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="8" class="text-center">No courses available.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
    </div>
</body>

</html>
