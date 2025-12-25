<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .first {
            background-color: #dff0d8;
            /* Light green for the first row */
        }

        .last {
            background-color: #f2dede;
            /* Light red for the last row */
        }
    </style>
</head>

<body>
    <h1>Users Index Page</h1>
    <p>This is the users index page.</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody> 
            @forelse($users as $user)
                <tr class="{{ $loop->first ? 'first' : '' }}
                    {{ $loop->last ? 'last' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user[0] }}</td>
                    <td>{{ $user[1] }}</td>
                    <td>{{ $user[2] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>

            @endforelse
            {{-- @foreach ($users as $user)
                <tr class="{{ $loop->first ? 'first' : '' }}
                    {{ $loop->last ? 'last' : '' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user[0] }}</td>
                    <td>{{ $user[1] }}</td>
                    <td>{{ $user[2] }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</body>

</html>
