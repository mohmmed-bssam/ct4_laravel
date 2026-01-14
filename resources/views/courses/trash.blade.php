<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Trashed Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="container my-5">
        @if (session('msg'))
            <div class="alert alert-{{ session('type') ?? 'info' }} alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-4">Courses List</h1>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">All Courses</a>

        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->deleted_at->diffForHumans()}}</td>
                        <td>
                            <div class="btn-group">

                                <a href="{{ route('courses.restore',$course->id) }}" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                                <form action="{{ route('courses.delete', $course->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure ?!')" type="submit"
                                        class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                </form>
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
            {{ $courses->appends($_GET)->links() }}
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>

</html>
