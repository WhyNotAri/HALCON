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

    <h1>Evidences - Order #{{ $order->invoice_number }}</h1>

    @if($evidences->count())
        <table border="1">
            <thead>
                32
                    <th>ID</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evidences as $evidence)
                <tr>
                    <td>{{ $evidence->id }}</td>
                    <td>{{ $evidence->type }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $evidence->image_path) }}" width="150">
                    </td>
                    <td>{{ $evidence->created_at }}</td>
                    <td>
                        <a href="{{ route('evidences.show', $evidence->id) }}">View</a>
                        <form action="{{ route('evidences.destroy', $evidence->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this evidence?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No evidences for this order</p>
    @endif
</body>
</html>