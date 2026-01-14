<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Lesson</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-4">Create New Lesson</h1>
            {{-- <a href="{{ route('courses.lessons.index') }}" class="btn btn-primary">All Courses</a> --}}

        </div>
        {{-- @include('form._errores') --}}
        <form action="{{ route('courses.lessons.store', $course->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                    class="form-control  @error('title')
                    is-invalid
                @enderror"
                    id="title" name="title">
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Youtube Link</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                    name="url">
                @error('url')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-file"></i> Save</button>
        </form>
    </div>

</body>

</html>
