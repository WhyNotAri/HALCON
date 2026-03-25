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

    <h1>{{ $costumer->name }}</h1>

    <!-- Costumer Details Table -->
    <table>
        <tr>
            <td><strong>Costumer Number:</strong></td>
            <td>{{ $costumer->costumer_number }}</td>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td>{{ $costumer->name }}</td>
        </tr>
        <tr>
            <td><strong>RFC:</strong></td>
            <td>{{ $costumer->rfc }}</td>
        </tr>
        <tr>
            <td><strong>Business Name:</strong></td>
            <td>{{ $costumer->business_name }}</td>
        </tr>
        <tr>
            <td><strong>Fiscal Address:</strong></td>
            <td>{{ $costumer->fiscal_address }}</td>
        </tr>
        <tr>
            <td><strong>Postal Code:</strong></td>
            <td>{{ $costumer->postal_code }}</td>
        </tr>
    </table>

    
    <!-- Costumer Options -->
    <div>
        <div>
            <button>
                <a href="{{ route('costumers.edit', $costumer->id) }}">Edit</a>
            </button>
        </div>
        <div>
            <form action="{{ route('costumers.destroy', $costumer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Costumer</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>