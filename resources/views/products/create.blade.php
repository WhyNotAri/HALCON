<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>

<!-- Back to Products List Button -->
<button>
    <a href="{{ route('products.index') }}">Back to Products List</a>
</button>

<h1>Create New Product</h1>

<!-- Create Product Form -->
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>
    </div>

    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>

    <div>
        <label for="stock">In Stock:</label>
        <input type="number" id="stock" name="stock" required>
    </div>

    <button type="submit">Create Product</button>
</form>
</body>
</html>
