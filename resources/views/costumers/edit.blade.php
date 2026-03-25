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

    <h1>Edit Costumer</h1>

    <!-- Edit Costumer Form -->
    <form action="{{ route('costumers.update', $costumer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="costumer_number">Costumer Number:</label>
            <input type="text" id="costumer_number" name="costumer_number" value="{{ $costumer->costumer_number }}">
        </div>

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $costumer->name }}">
        </div>

        <div>
            <label for="rfc">RFC:</label>
            <input type="text" id="rfc" name="rfc" value="{{ $costumer->rfc }}">
        </div>

        <div>
            <label for="business_name">Business Name:</label>
            <input type="text" id="business_name" name="business_name" value="{{ $costumer->business_name }}">
        </div>

        <div>
            <label for="fiscal_address">Fiscal Address:</label>
            <input type="text" id="fiscal_address" name="fiscal_address" value="{{ $costumer->fiscal_address }}">
        </div>

        <div>
            <label for="postal_code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ $costumer->postal_code }}">
        </div>

        <button type="submit">Update Costumer</button>
    </form>

</body>
</html>