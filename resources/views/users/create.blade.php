<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Create User</title>
</head>

<body>
    <button>
        <a href="{{ route('users.index') }}">Back to Users List</a>
    </button>

    <h1>Create New User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Role:</label>
            <select name="role" required>
                <option value="admin">Admin</option>
                <option value="sales">Sales</option>
                <option value="purchasing">Purchasing</option>
                <option value="warehouse">Warehouse</option>
                <option value="route">Route</option>
            </select>
        </div>

        <div>
            <label>Department:</label>
            <input type="text" name="department">
        </div>

        <div>
            <label>Status:</label>
            <select name="is_active">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit">Create User</button>
    </form>
</body>
</html>