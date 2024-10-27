<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleAttributesSeeder extends Seeder
{
    /**
     * Seed the vehicle_attributes table.
     *
     * @return void
     */
    public function run()
    {
        $vehicleAttributes = [
            [
                'make' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2022,
                'color' => 'Blue',
                'seats' => 5,
                'mileage' => 15000,
                'fuel_type' => 'Petrol',
                'vehicle_type' => 3,
            ],
            [
                'make' => 'Ford',
                'model' => 'Mustang',
                'year' => 2021,
                'color' => 'Red',
                'seats' => 2,
                'mileage' => 5000,
                'fuel_type' => 'Petrol',
                'vehicle_type' => 4,
            ],
        ];

        DB::table('vehicle_attributes')->insert($vehicleAttributes);
    }
}
