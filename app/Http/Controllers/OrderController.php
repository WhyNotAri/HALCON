<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Costumer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $costumers = Costumer::all();
        return view('orders.create', compact('costumers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create([
            'invoice_number' => $request->invoice_number,
            'customer_id' => $request->customer_id,
            'status' => 'ordered',
            'order_date' => now(),
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $costumers = Costumer::all();
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order', 'costumers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);
        $costumers = Costumer::all();

        return view('orders.edit', compact('order', 'costumers'));
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
            'notes' => $request->notes
        ]);

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
}
