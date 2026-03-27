<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Evidence;

class EvidenceController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $order_id)
    {
        $order = Order::findOrFail($order_id);
        $evidences = $order->evidences;

        return view('evidences.index', compact('order', 'evidences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $order_id)
    {
        $order = Order::findOrFail($order_id);
        $type = request('type');
        
        return view('evidences.create', compact('order', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $order_id)
    {
        try {
            $request->validate([
                'image' => 'required|image|max:2048',
                'type' => 'required|in:in_route,delivered'
            ]);

            $order = Order::findOrFail($order_id);

            //I used this to see what was wrong when loading the image, you can remove it if you want, although it's not a bad thing
            if (!$request->hasFile('image')) {
                return back()->with('error', 'No se recibió ninguna imagen');
            }
            
            $imagePath = $request->file('image')->store('evidences', 'public');

            if (!$imagePath) {
                return back()->with('error', 'Error al guardar la imagen');
            }
            
            $evidence = $order->evidences()->create([
                'image_path' => $imagePath,
                'type' => $request->type
            ]);
            
            if (!$evidence) {
                return back()->with('error', 'Error al crear el registro');
            }
            
            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Evidencia guardada correctamente');
                
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evidence = Evidence::findOrFail($id);
        $order = Order::findOrFail($evidence->order_id); // Corregido aquí
        
        return view('evidences.show', compact('evidence', 'order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evidence = Evidence::findOrFail($id);
        $orderId = $evidence->order_id;
        
        if (file_exists(storage_path('app/public/' . $evidence->image_path))) {
            unlink(storage_path('app/public/' . $evidence->image_path));
        }
        
        $evidence->delete();

        return redirect()->route('evidences.index', $orderId);
    }
}
