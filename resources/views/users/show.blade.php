<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - User Details</title>
</head>

<body>

    <!-- Back to Summary Button -->
    <button>
        <a href="{{ route('summary') }}">Back to Summary</a>
    </button>

    <h1>User Details</h1>

    <!-- Back to Users List Button -->

    <button>
        <a href="{{ route('users.index') }}">Back to Users List</a>
    </button>

    <table>
        <tr>
            <th>ID:</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name:</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role:</th>
            <td>{{ $user->role?->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Department:</th>
            <td>{{ $user->department ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
        </tr>
        <tr>
            <th>Created At:</th>
            <td>{{ $user->created_at }}</td>
        </tr>
    </table>

    <dvi>
        <div>
            <button>
                <a href="{{ route('users.edit', $user->id) }}">Edit User</a>
            </button>
        </div>
        <div>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
            </form>
        </div>
    </dvi>

</body>
</html>
