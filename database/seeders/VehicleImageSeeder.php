<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VehicleImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicle_images')->insert([
            [
                'vehicle_id' => 1,
                'image_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 1,
                'image_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 2,
                'image_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vehicle_id' => 2,
                'image_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
