<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<button>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</button>

<body>
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
                <th>Customer ID</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Delivery Address</th>
                <th>Notes</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->customer_id }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>{{ $order->notes }}</td>
                    <td><button><a href="{{ route('orders.show', $order->id) }}">View</a></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>