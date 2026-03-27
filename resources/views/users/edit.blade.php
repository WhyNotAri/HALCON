<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Edit User</title>
</head>

<body>
    <button>
        <a href="{{ route('users.index') }}">Back to Users List</a>
    </button>

    <h1>Edit User: {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label>Password (leave blank to keep current):</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Role:</label>
            <select name="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="sales" {{ $user->role == 'sales' ? 'selected' : '' }}>Sales</option>
                <option value="purchasing" {{ $user->role == 'purchasing' ? 'selected' : '' }}>Purchasing</option>
                <option value="warehouse" {{ $user->role == 'warehouse' ? 'selected' : '' }}>Warehouse</option>
                <option value="route" {{ $user->role == 'route' ? 'selected' : '' }}>Route</option>
            </select>
        </div>

        <div>
            <label>Department:</label>
            <input type="text" name="department" value="{{ $user->department }}">
        </div>

        <div>
            <label>Status:</label>
            <select name="is_active">
                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit">Update User</button>
    </form>
</body>
</html>