<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

<!-- Back to Summary button -->
<button>
    <a href="{{ route('summary') }}">Back to Summary</a>
</button>

<h1>Products</h1>

<!-- Create New Order Button -->
<button>
    <a href="{{ route('products.create') }}">Create New Product</a>
</button>

<!-- Orders List -->
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
    </thead>

    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td><button><a href="{{ route('products.show', $product->id) }}">View</a></button></td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
