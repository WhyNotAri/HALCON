<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Users</title>
</head>

<button>
    <a href="{{ route('summary') }}">Back to Summary</a>
</button>

<body>
    <h1>Users</h1>

    <button>
        <a href="{{ route('users.create') }}">Create New User</a>
    </button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Department</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role?->name ?? '-' }}</td>
                <td>{{ $user->department ?? '-' }}</td>
                <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                <td><button><a><a href="{{ route('users.show', $user->id) }}">View</a></a></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
