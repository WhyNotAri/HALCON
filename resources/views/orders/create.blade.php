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
            <label>Products:</label>
            <div id="product-selects">
                <div class="product-row">
                    <label for="product_1">Product 1:</label>
                    <select id="product_1" name="product_1" required>
                        <option value="">Select a Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                        @endforeach
                    </select>
                    <label for="quantity_1">Quantity:</label>
                    <input type="number" id="quantity_1" name="quantity_1" min="1" value="1" required>
                </div>
            </div>
            <button type="button" id="add-product-btn">Add Product</button>
        </div>

        <div>
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"></textarea>
        </div>

        <button type="submit">Create Order</button>
    </form>

    <script>
        const productSelectsContainer = document.getElementById('product-selects');
        const addProductButton = document.getElementById('add-product-btn');
        let productSelectCount = 1;

        function createProductSelect(index) {
            const wrapper = document.createElement('div');
            wrapper.className = 'product-row';
            wrapper.innerHTML = `
                <label for="product_${index}">Product ${index}:</label>
                <select id="product_${index}" name="product_${index}" required>
                    <option value="">Select a Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                    @endforeach
                </select>
                <label for="quantity_${index}">Quantity:</label>
                <input type="number" id="quantity_${index}" name="quantity_${index}" min="1" value="1" required>
                <button type="button" class="remove-product-btn">Remove</button>
            `;

            return wrapper;
        }

        addProductButton.addEventListener('click', () => {
            productSelectCount += 1;
            productSelectsContainer.appendChild(createProductSelect(productSelectCount));
        });

        productSelectsContainer.addEventListener('click', (event) => {
            if (!event.target.classList.contains('remove-product-btn')) {
                return;
            }

            event.target.closest('.product-row').remove();
        });
    </script>
</body>
</html>
