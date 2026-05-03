<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Summary</title>
</head>

<body>
    <h1>Summary</h1>

    <!-- Navigation Menu -->
    <div>
        <a href="{{ route('costumers.index') }}">Costumers</a>
        <a href="{{ route('orders.index') }}">Orders</a>
        <a href="{{ route('users.index') }}">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
    </div>

    <hr>

    <!-- Statistics Cards -->
    <table>
        <tr>
            <th>Total Costumers</th>
            <th>Total Orders</th>
            <th>Total Evidences</th>
            <th>Total Users</th>
        </tr>
        <tr>
            <td>{{ $totalCostumers }}</td>
            <td>{{ $totalOrders }}</td>
            <td>{{ $totalEvidences }}</td>
            <td>{{ $totalUsers }}</td>
        </tr>
    </table>

    <br>

    <!-- Orders by Status -->
    <h3>Orders by Status</h3>
    <table>
        <tr>
            <th>Ordered</th>
            <th>In Process</th>
            <th>In Route</th>
            <th>Delivered</th>
        </tr>
        <tr>
            <td>{{ $ordersByStatus['ordered'] }}</td>
            <td>{{ $ordersByStatus['in_process'] }}</td>
            <td>{{ $ordersByStatus['in_route'] }}</td>
            <td>{{ $ordersByStatus['delivered'] }}</td>
        </tr>
    </table>

    <br>

    <!-- Recent Orders -->
    <h3>Recent Orders (Last 5)</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Invoice Number</th>
                <th>Customer ID</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td><a href="{{ route('orders.show', $order->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
