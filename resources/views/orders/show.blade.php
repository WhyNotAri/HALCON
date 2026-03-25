<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <h1>Invoice: {{ $order->invoice_number }}</h1>

    <!-- Back to Orders List Button -->
    <button>
        <a href="{{ route('orders.index') }}">Back to Orders List</a>
    </button>

    <!-- Order Details Table -->
    <table>
        <tr>
            <td><strong>Order ID:</strong></td>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <td><strong>Costumer ID:</strong></td>
            <td>{{ $order->customer_id }}</td>
        </tr>
        <tr>
            <td><strong>Costumer Name:</strong></td>
            <td>
                {{ $costumers->where('id', $order->customer_id)->first()->name ?? 'Unknown Costumer' }}
            </td>
        </tr>
        <tr>
            <td><strong>Status:</strong></td>
            <td>{{ $order->status }}</td>
        </tr>
        <tr>
            <td><strong>Order Date:</strong></td>
            <td>{{ $order->order_date }}</td>
        </tr>
        <tr>
            <td><strong>Delivery Address:</strong></td>
            <td>{{ $order->delivery_address }}</td>
        </tr>
        <tr>
            <td><strong>Notes:</strong></td>
            <td>{{ $order->notes }}</td>
        </tr>
    </table>

    
    <!-- Order Options -->
    <div>
        <div>
            <button>
                <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
            </button>
        </div>
        <div>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Order</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>