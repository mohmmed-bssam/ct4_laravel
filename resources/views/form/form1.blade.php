<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{ route('form1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text"
                    class="form-control @error('name')
                    is-invalid
                @enderror"
                    name="name" value="{{ old('name') }}" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text"
                    class="form-control @error('email')
                    is-invalid
                @enderror"
                    name="email" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password"
                    class="form-control @error('password')
                    is-invalid
                @enderror"
                    name="password" value="{{ old('password') }}" />
                @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password"
                    class="form-control @error('confirm_password')
                    is-invalid
                @enderror"
                    name="confirm_password" value="{{ old('confirm_password') }}" />
                @error('confirm_password')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file"
                    class="form-control @error('image')
                    is-invalid
                @enderror"
                    name="image" value="{{ old('image') }}"/>
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success px-5" type="submit">Send</button>

        </form>
    </div>
</body>

</html>
