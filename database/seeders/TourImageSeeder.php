<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tour_images')->insert([
            [
                'tour_id' => 1,
                'image_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tour_id' => 1,
                'image_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tour_id' => 2,
                'image_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tour_id' => 2,
                'image_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tour_id' => 3,
                'image_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tour_id' => 3,
                'image_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
