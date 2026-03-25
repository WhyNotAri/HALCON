<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'Laravel')}}</title>
</head>

<body>
    
    <!-- Back to Orders List Button -->
    <button>
        <a href="{{ route('orders.index') }}">Back to Orders List</a>
    </button>

    <h1>Edit Order</h1>

    <!-- Edit Order Form -->
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="invoice_number">Invoice Number:</label>
            <input type="text" id="invoice_number" name="invoice_number" value="{{ $order->invoice_number }}" required>
        </div>

        <div>
            <label for="customer_id">Customer:</label>
            <select name="customer_id" required>
                <option value="">Select a Customer</option>
                @foreach($costumers as $costumer)
                    <option value="{{ $costumer->id }}" {{ $order->customer_id == $costumer->id ? 'selected' : '' }}>
                        {{ $costumer->name }} {{ $costumer->costumer_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" id="delivery_address" name="delivery_address" value="{{ $order->delivery_address }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="ordered" {{ $order->status == 'ordered' ? 'selected' : '' }}>ordered</option>
                <option value="in_process" {{ $order->status == 'in_process' ? 'selected' : '' }}>in process</option>
                <option value="in_route" {{ $order->status == 'in_route' ? 'selected' : '' }}>in route</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>delivered</option>
            </select>
        </div>

        <div>
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes">{{ $order->notes }}</textarea>
        </div>


        <button type="submit">Update Order</button>
    </form>

</body>
</html>