<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Laravel')}}</title>
</head>
<body>

<!-- Back to Products List Button -->
<button>
    <a href="{{ route('products.index') }}">Back to Products List</a>
</button>

<h1>{{ $products->name }}</h1>

<!-- Product Details Table -->
<table>
    <tr>
        <td><strong>Name:</strong></td>
        <td>{{ $products->name }}</td>
    </tr>
    <tr>
        <td><strong>Description:</strong></td>
        <td>{{ $products->description }}</td>
    </tr>
    <tr>
        <td><strong>Price:</strong></td>
        <td>{{ $products->price }}</td>
    </tr>
    <tr>
        <td><strong>In Stock:</strong></td>
        <td>{{ $products->stock }}</td>
    </tr>
</table>


<!-- Product Options -->
<div>
    <div>
        <button>
            <a href="{{ route('products.edit', $products->id) }}">Edit</a>
        </button>
    </div>
    <div>
        <form action="{{ route('products.destroy', $products->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Product</button>
        </form>
    </div>
</div>


</body>
</html>
