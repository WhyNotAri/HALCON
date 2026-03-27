<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <button>
        <a href="{{ route('evidences.index', $order->id) }}">Back to Evidences</a>
    </button>

    <h1>Evidence Details</h1>

    <table border="1">
        <tr>
            <th>Order ID:</th>
            <td>{{ $evidence->order_id }}</td>
        </tr>
        <tr>
            <th>Type:</th>
            <td>{{ $evidence->type }}</td>
        </tr>
        <tr>
            <th>Image:</th>
            <td>
                <img src="{{ asset('storage/' . $evidence->image_path) }}" width="400">
            </td>
        </tr>
        <tr>
            <th>Created At:</th>
            <td>{{ $evidence->created_at }}</td>
        </tr>
    </table>

    <div>
        <form action="{{ route('evidences.destroy', $evidence->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this evidence?')">Delete Evidence</button>
        </form>
    </div>
</body>
</html>