<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VehicleAttribute;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Vehicle =  VehicleAttribute::orderBy('created_at', 'desc')->paginate(10);

        return view('adminpanel.vehicle.vehicle_attributes.index', ['vehicles' => $Vehicle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('adminpanel.vehicle.vehicle_attributes.create', ['types' => VehicleType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'seats' => 'required|integer|min:1|max:200',
            'mileage' => 'nullable|integer|min:1',
            'fuel_type' => 'nullable|string',
            'vehicle_type' => 'required|string|max:50',
            'key.*' => 'nullable|string|max:50',
            'value.*' => 'nullable|string|max:50',
        ]);

        $data = [];
        foreach ($validatedData['key'] as $index => $key) {
            $data[$key] = $validatedData['value'][$index] ?? null;
        }

        $validatedData['dynamic_fields'] = json_encode($data);

        VehicleAttribute::create($validatedData);
        return redirect()->route('vehicle-attribute.index')->with('success', 'Vehicle created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $VehicleVehicleAttribute = VehicleAttribute::find($id);

        if (!$VehicleVehicleAttribute) {
            return abort(404, 'VehicleVehicleAttribute not found'); // Handle non-existentVehicleAttribute
        }


        return view('adminpanel.VehicleVehicleAttribute.show', ['VehicleVehicleAttribute' => $VehicleVehicleAttribute]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $VehicleAttribute = VehicleAttribute::find($id);

        if (!$VehicleAttribute) {
            return abort(404, 'VehicleAttribute not found');
        }

        return view('adminpanel.vehicle.vehicle_attributes.edit', ['vehicle' => $VehicleAttribute, 'types' => VehicleType::all()]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'seats' => 'required|integer|min:1|max:200',
            'mileage' => 'nullable|integer|min:1',
            'fuel_type' => 'nullable|string',
            'vehicle_type' => 'required|string|max:50',
            'key.*' => 'nullable|string|max:50',
            'value.*' => 'nullable|string|max:50',
        ]);

        $data = [];
        foreach ($validatedData['key'] as $index => $key) {
            $data[$key] = $validatedData['value'][$index] ?? null;
        }

        $validatedData['dynamic_fields'] = json_encode($data);
        VehicleAttribute::findOrFail($id)->update($validatedData);
        return redirect()->route('vehicle-attribute.index')->with('success', 'Vehicle updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = VehicleAttribute::find($id);

        if (!$vehicle) {
            return abort(404, 'Vehicle not found');
        }

        $vehicle->delete();

        return redirect()->route('vehicle-attribute.index')->with('success', 'Vehicle deleted successfully!');
    }
}
