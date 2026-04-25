<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <h1>Invoice: {{ $order->invoice_number }}</h1>

    <!-- Back to Dashboard -->
    <button>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    </button>
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
                {{ $order->costumer->name ?? 'Unknown Costumer' }}
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
        <tr>
            <td><strong>Products:</strong></td>
            <td>
                @if($order->products->isNotEmpty())
                    @foreach($order->products as $product)
                        {{ $product->name }} ({{ $product->pivot->quantity ?? 1 }}){{ !$loop->last ? ', ' : '' }}
                    @endforeach
                @else
                    No products assigned
                @endif
            </td>
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

    <!-- Change Status Form -->
    <div>
        <h3>Change Status</h3>
        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" required>
                <option value="ordered" {{ $order->status == 'ordered' ? 'selected' : '' }}>ordered</option>
                <option value="in_process" {{ $order->status == 'in_process' ? 'selected' : '' }}>in process</option>
                <option value="in_route" {{ $order->status == 'in_route' ? 'selected' : '' }}>in route</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>delivered</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    </div>

    <!-- Evidences Section -->
    <div>
        <h3>Evidences</h3>
        <button>
            <a href="{{ route('evidences.index', $order->id) }}">View All Evidences</a>
        </button>
    </div>

</body>
</html>
