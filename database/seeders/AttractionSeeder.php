<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttractionSeeder extends Seeder
{
    public function run()
    {
        DB::table('attractions')->insert([
            [
                'title' => 'Beautiful Beach',
                'slug' => Str::slug('Beautiful Beach'),
                'description' => 'A beautiful beach with golden sand and clear water.',
                'status' => 'open',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Mountain Hike',
                'slug' => Str::slug('Mountain Hike'),
                'description' => 'A scenic mountain hike with stunning views.',
                'status' => 'open',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Historical Museum',
                'slug' => Str::slug('Historical Museum'),
                'description' => 'A museum showcasing historical artifacts and exhibitions.',
                'status' => 'closed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
