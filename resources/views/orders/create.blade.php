<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>

    <!-- Back to Orders List Button -->
    <button>
        <a href="{{ route('orders.index') }}">Back to Orders List</a>
    </button>

    <h1>Create New Order</h1>

    <!-- Create Order Form -->
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div>
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" id="invoice_number" name="invoice_number" required>
        </div>

        <div>
            <label for="customer_id">Customer:</label>
            <select name="customer_id" required>
                <option value="">Select a Customer</option>
                @foreach($costumers as $costumer)
                    <option value="{{ $costumer->id }}">{{ $costumer->name }} {{ $costumer->costumer_number }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" required>
        </div>

        <div>
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"></textarea>
        </div>

        <button type="submit">Create Order</button>
    </form>
</body>
</html>