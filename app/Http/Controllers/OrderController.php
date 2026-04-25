<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Costumer;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['costumer', 'products'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $costumers = Costumer::all();
        $products = Product::all();

        return view('orders.create', compact('costumers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'invoice_number' => $request->invoice_number,
            'customer_id' => $request->customer_id,
            'status' => 'ordered',
            'order_date' => now(),
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
        ]);
        $order->products()->sync($this->extractProductsWithQuantities($request));

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['costumer', 'products'])->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('products')->findOrFail($id);
        $costumers = Costumer::all();
        $products = Product::all();
        $selectedProducts = $order->products->map(fn ($product) => [
            'id' => $product->id,
            'quantity' => $product->pivot->quantity ?? 1,
        ])->values()->all();

        return view('orders.edit', compact('order', 'costumers', 'products', 'selectedProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'invoice_number' => $request->invoice_number,
            'customer_id' => $request->customer_id,
            'status' => $request->status,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
        ]);
        $order->products()->sync($this->extractProductsWithQuantities($request));

        return redirect()->route('orders.index', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index');
    }

    /**
     * Update order status and redirect to evidence if needed
     */
    public function updateStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $newStatus = $request->status;

        $order->update([
            'status' => $newStatus
        ]);

        if ($newStatus == 'in_route' || $newStatus == 'delivered') {
            return redirect()->route('evidences.create', [
                'order_id' => $order->id,
                'type' => $newStatus
            ]);
        }

        return redirect()->route('orders.show', $order->id);
    }

    private function extractProductsWithQuantities(Request $request): array
    {
        $productsWithQuantities = [];

        foreach ($request->all() as $key => $productId) {
            if (!str_starts_with($key, 'product_') || !$productId) {
                continue;
            }

            $productId = (int) $productId;
            $quantityKey = str_replace('product_', 'quantity_', $key);
            $quantity = max(1, (int) $request->input($quantityKey, 1));

            $productsWithQuantities[$productId]['quantity'] = ($productsWithQuantities[$productId]['quantity'] ?? 0) + $quantity;
        }

        return $productsWithQuantities;
    }
}
