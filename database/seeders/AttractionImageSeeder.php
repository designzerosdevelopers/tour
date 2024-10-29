<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AttractionImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attraction_images')->insert([
            [
                'attraction_id' => 1,
                'image_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'attraction_id' => 2,
                'image_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'attraction_id' => 3,
                'image_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
