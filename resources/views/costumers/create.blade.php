<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Laravel')}}</title>
</head>

<body>

    <!-- Back to Costumers List Button -->
    <button>
        <a href="{{ route('costumers.index') }}">Back to Costumers List</a>
    </button>

    <h1>Create New Costumer</h1>

    <form action="{{ route('costumers.store') }}" method="POST">
        @csrf

        <div>
            <label for="costumer_number">Costumer Number:</label>
            <input type="text" id="costumer_number" name="costumer_number" required>
        </div>

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="rfc">RFC:</label>
            <input type="text" id="rfc" name="rfc" required>
        </div>

        <div>
            <label for="business_name">Business Name:</label>
            <input type="text" id="business_name" name="business_name" required>
        </div>

        <div>
            <label for="fiscal_address">Fiscal Address:</label>
            <input type="text" id="fiscal_address" name="fiscal_address" required>
        </div>

        <div>
            <label for="postal_code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" required>
        </div>

        <button type="submit">Create Costumer</button>
    </form>
</body>
</html>