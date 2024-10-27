<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_images')->insert([
            [
                'post_id' => 1,
                'image_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 2,
                'image_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 3,
                'image_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 4,
                'image_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 5,
                'image_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 6,
                'image_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 7,
                'image_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 8,
                'image_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 9,
                'image_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 10,
                'image_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 11,
                'image_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 12,
                'image_id' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 13,
                'image_id' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 14,
                'image_id' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 15,
                'image_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
