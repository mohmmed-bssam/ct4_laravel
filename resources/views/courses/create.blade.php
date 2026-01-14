<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container my-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="mb-4">Create New Course</h1>
        <a href="{{ route('courses.index') }}" class="btn btn-primary">All Courses</a>

        </div>
        {{-- @include('form._errores') --}}
        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control  @error('title')
                    is-invalid
                @enderror" id="title" name="title" >
                  @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" accept=".png,.jpg" name="image" >
                    @error('image')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
            </div>
            {{-- <x-input  name="description" label="Description"/> --}}
            <div class="mb-3">
                <label for="hour" class="form-label">Hours</label>
                <input type="number" class="form-control @error('hour') is-invalid @enderror" id="hour" name="hour">
                    @error('hour')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" step="0.01" >
                @error('price')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4"></textarea>
                @error('content')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

</body>
</html>
