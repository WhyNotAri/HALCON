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

<h1>Edit Product</h1>

<!-- Edit Product Form -->
<form action="{{ route('products.update', $products->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $products->name }}">
    </div>

    <div>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ $products->description }}">
    </div>

    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.1" value="{{ $products->price }}">
    </div>

    <div>
        <label for="stock">In Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ $products->stock }}">
    </div>

    <button type="submit">Update Product</button>
</form>

</body>
</html>
