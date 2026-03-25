<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Laravel')}}</title>
</head>

<body>

    <h1>Costumers List</h1>

    <!-- Create New Costumer Button -->
    <button>
        <a href="{{ route('costumers.create') }}">Create New Costumer</a>
    </button>
    
    <!-- Costumers Table -->
    <table>
        <thead>
            <tr>
                <th>Costumer Number</th>
                <th>Name</th>
                <th>RFC</th>
                <th>Business Name</th>
                <th>Fiscal Address</th>
                <th>Postal Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($costumers as $costumer)
                <tr>
                    <td>{{ $costumer->costumer_number }}</td>
                    <td>{{ $costumer->name }}</td>
                    <td>{{ $costumer->rfc }}</td>
                    <td>{{ $costumer->business_name }}</td>
                    <td>{{ $costumer->fiscal_address }}</td>
                    <td>{{ $costumer->postal_code }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>