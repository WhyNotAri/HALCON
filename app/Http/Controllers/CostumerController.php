<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumers = Costumer::all();
        return view('costumers.index', compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Costumer::create([
            'costumer_number' => $request->costumer_number,
            'name' => $request->name,
            'rfc' => $request->rfc,
            'business_name' => $request->business_name,
            'fiscal_address' => $request->fiscal_address,
            'postal_code' => $request->postal_code
        ]);

        return redirect()->route('costumers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $costumer = Costumer::findOrFail($id);
        return view('costumers.show', compact('costumer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $costumer = Costumer::findOrFail($id);
        return view('costumers.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $costumer = Costumer::findOrFail($id);
        $costumer->update([
            'costumer_number' => $request->costumer_number,
            'name' => $request->name,
            'rfc' => $request->rfc,
            'business_name' => $request->business_name,
            'fiscal_address' => $request->fiscal_address,
            'postal_code' => $request->postal_code
        ]);

        return redirect()->route('costumers.show', $costumer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $costumer = Costumer::findOrFail($id);
        $costumer->delete();

        return redirect()->route('costumers.index');
    }
}
