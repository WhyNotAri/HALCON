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

    <h1>Orders</h1>

    <!-- Create New Order Button -->
    <button>
        <a href="{{ route('orders.create') }}">Create New Order</a>
    </button>

    <!-- Orders List -->
    <table>
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Delivery Address</th>
                <th>Products</th>
                <th>Notes</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->costumer->name ?? 'Unknown Costumer' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>
                        @foreach($order->products as $product)
                            {{ $product->name }} ({{ $product->pivot->quantity ?? 1 }}){{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                    <td>{{ $order->notes }}</td>
                    <td><button><a href="{{ route('orders.show', $order->id) }}">View</a></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
