<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypesSeeder extends Seeder
{
    /**
     * Seed the vehicle_types table.
     *
     * @return void
     */
    public function run()
    {
        $vehicleTypes = [
            ['title' => 'SUV'],
            ['title' => 'Bus'],
            ['title' => 'Car'],
            ['title' => 'Sportscar'],
            ['title' => 'Truck'],
            ['title' => 'Roofless'],
            ['title' => 'Jeep'],
            ['title' => 'Bike'],
        ];

        DB::table('vehicle_types')->insert($vehicleTypes);
    }
}
