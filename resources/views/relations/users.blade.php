<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
        <div class="container my-5">
            <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-4">Users List</h1>
            <div>
                <a href="#" class="btn btn-primary">Create New User</a>

            </div>

        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Passport Serial</th>
                    <th>Passport Start</th>
                    <th>Passport End</th>
                    <th>Joined At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->Passport->start_date }}</td>
                    <td>{{ $user->Passport->serial }}</td>
                    <td>{{ $user->Passport->end_date }}</td>
                    
                    <td>{{ $user->created_at ? $user->created_at->format('d-M-Y | h:m:s A') : '-' }}</td>
                </tr>

                 @empty
                    <tr>
                        <td colspan="8" class="text-center">No Users available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        </div>
</body>

</html>
