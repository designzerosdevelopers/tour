<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpanel.vehicle.vehicle_type.index', ['types' => VehicleType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        VehicleType::create([
            'title' => $validatedData['title'],
        ]);

        return redirect()->route('vehicle-type.index')
            ->with('success', 'Vehicle type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $type = VehicleType::findOrFail($id);
        return view('adminpanel.vehicle.vehicle_type.index', ['types' => VehicleType::all(), 'type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $type = VehicleType::findOrFail($id);

        $type->update($validatedData);

        return redirect()->route('vehicle-type.index')
            ->with('success', 'Vehicle type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = VehicleType::findOrFail($id);
        $type->delete();

        return redirect()->route('vehicle-type.index')
            ->with('success', 'Vehicle type deleted successfully');
    }
}
