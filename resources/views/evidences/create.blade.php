<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <button>
        <a href="{{ route('orders.show', $order->id) }}">Back to Order</a>
    </button>

    <h1>Add Evidence - Order #{{ $order->invoice_number }}</h1>
    <h3>Type: {{ $type }}</h3>

    <form action="{{ route('evidences.store', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">

        <div>
            <label for="image">Photo:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit">Save Evidence</button>
    </form>
</body>

@if($errors->any())
    <div style="color: red; border: 1px solid red; padding: 10px; margin: 10px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div style="color: red; border: 1px solid red; padding: 10px; margin: 10px;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="color: green; border: 1px solid green; padding: 10px; margin: 10px;">
        {{ session('success') }}
    </div>
@endif
</html>