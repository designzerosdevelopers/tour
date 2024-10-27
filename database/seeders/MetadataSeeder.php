<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetadataSeeder extends Seeder
{
    /**
     * Seed the metadata table.
     *
     * @return void
     */
    public function run()
    {
        $metadata = [
            // Metadata for vehicles
            [
                'meta_title' => 'Toyota Corolla 2022',
                'meta_keyword' => 'Toyota, Corolla, 2022',
                'meta_description' => 'The 2022 Toyota Corolla offers reliability and efficiency.',
                'model_type' => 'App\\Models\\Vehicle',
                'model_id' => 1, // Example vehicle ID
            ],
            [
                'meta_title' => 'Ford Mustang 2021',
                'meta_keyword' => 'Ford, Mustang, 2021',
                'meta_description' => 'The 2021 Ford Mustang is a classic American muscle car with modern features.',
                'model_type' => 'App\\Models\\Vehicle',
                'model_id' => 2, // Example vehicle ID
            ],
            [
                'meta_title' => 'Grand Canyon Tour 2024',
                'meta_keyword' => 'Grand Canyon, tour, 2024',
                'meta_description' => 'Experience the majestic Grand Canyon with our 2024 tour package. Discover breathtaking views and unforgettable adventures.',
                'model_type' => 'App\\Models\\Tour',
                'model_id' => 1, // Example tour ID for Grand Canyon Tour
            ],
            [
                'meta_title' => 'Yellowstone Adventure 2024',
                'meta_keyword' => 'Yellowstone, adventure, 2024',
                'meta_description' => 'Join our 2024 Yellowstone adventure tour and explore the beauty of one of the most iconic national parks in the world.',
                'model_type' => 'App\\Models\\Tour',
                'model_id' => 2, // Example tour ID for Yellowstone Adventure
            ],
            [
                'meta_title' => 'Exploring the Best Sports Cars of 2024',
                'meta_keyword' => 'sports cars, 2024, review',
                'meta_description' => 'A detailed review of the best sports cars available in 2024. Explore performance, design, and features.',
                'model_type' => 'App\\Models\\Post',
                'model_id' => 1, // Example blog model ID for best sports cars
            ],
            [
                'meta_title' => 'Health Benefits of a Balanced Diet',
                'meta_keyword' => 'top sports cars, enthusiasts, review',
                'meta_description' => 'Discover the top 5 sports cars that every car enthusiast should consider. Insights into performance and design.',
                'model_type' => 'App\\Models\\Post',
                'model_id' => 2,
            ],


        ];


        DB::table('metadata')->insert($metadata);
    }
}
