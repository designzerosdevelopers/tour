<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use App\Traits\CurrencyConverterTrait;

class RentalController extends Controller
{

    use CurrencyConverterTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('frontend.rental.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $currency = Session::get('currency', 'AED');

        $query = Vehicle::Join('vehicle_attributes', 'vehicles.vehicle_id', '=', 'vehicle_attributes.id')
            ->select('vehicles.*')
            ->with(['images', 'vehicle_attributes'])
            ->distinct();

        if (!empty($request->checkedVehicles)) {
            $checkedVehicleTypes = $request->input('checkedVehicles', []);
            if (!is_array($checkedVehicleTypes)) {
                $checkedVehicleTypes = explode(',', $checkedVehicleTypes);
            }
            $query->whereIn('vehicle_attributes.vehicle_type', $checkedVehicleTypes);
        }

        if (!empty($request->checkedSeats)) {
            $checkedVehicleSeats = $request->input('checkedSeats', []);
            if (!is_array($checkedVehicleSeats)) {
                $checkedVehicleSeats = explode(',', $checkedVehicleSeats);
            }
            $query->whereIn('vehicle_attributes.seats', $checkedVehicleSeats);
        }

        if (!empty($request->priceRange)) {
            $priceRange =  $request->priceRange;
            $response = $this->currencyAPI();
            if ($response['result'] === 'success') {
                $priceRange = [
                    $request->priceRange[0] / $response['conversion_rates'][$currency],
                    $request->priceRange[1] / $response['conversion_rates'][$currency]
                ];
            }
            $query->whereBetween('vehicles.price', $priceRange);
        }

        $perPage = 10;
        $page = $request->input('page', 1);
        $vehicles = $query->paginate($perPage, ['*'], 'page', $page);

        $vehicleTypeDetails = DB::table('vehicle_types')
            ->leftJoin('vehicle_attributes', 'vehicle_types.id', '=', 'vehicle_attributes.vehicle_type')
            ->select('vehicle_types.id as type_id', 'vehicle_types.title as type_title', DB::raw('count(vehicle_attributes.vehicle_type) as count'))
            ->groupBy('vehicle_types.id', 'vehicle_types.title')
            ->get()
            ->toArray();

        $vSeats = DB::table('vehicle_attributes')
            ->join('vehicles', 'vehicles.vehicle_id', '=', 'vehicle_attributes.id')
            ->pluck('vehicle_attributes.seats')
            ->unique();


        foreach ($vehicles as $vehicle) {
            $vehicle->price = $this->arrayFormatCurrency($vehicle->price);
        }


        $data = [
            'vehicles' => $vehicles->items(),
            'selectedCurrency' => $currency,
            'pagination' => [
                'currentPage' => $vehicles->currentPage(),
                'lastPage' => $vehicles->lastPage(),
                'perPage' => $vehicles->perPage(),
                'total' => $vehicles->total(),
            ],
            'vehicletypes' => $vehicleTypeDetails,
            'vseats' => $vSeats,
            'status' => 'success',
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $vehicle = Vehicle::where('slug', $slug)
            ->with(['metadata', 'images', 'vehicle_attributes'])
            ->firstOrFail();
        $vehicle->vehicle_type = VehicleType::find($vehicle->vehicle_attributes->vehicle_type)->title ?? '';
        $vehicle->price = $this->formatCurrency($vehicle->price);
        $vehicle->vehicle_attributes->dynamic_fields =    json_decode($vehicle->vehicle_attributes->dynamic_fields, true);
        $vehicle->more_fields =    json_decode($vehicle->more_fields, true);
        return view('frontend.rental.detail', ['post' => $vehicle, 'metadata' => $vehicle->metadata]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
