<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert 5 destination records
        Destination::insert([
                [
                    'title' => 'Beautiful Beach',
                    'slug' => 'beautiful-beach',
                    'status' => 1,
                    'country_id' => 1, 
                    'description' => 'A lovely beach destination with crystal clear water and white sand.',
                    'featured_image' => 1,  
                ],
                [
                    'title' => 'Mountain Adventure',
                    'slug' => 'mountain-adventure',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'An exciting mountain destination for adventure lovers.',
                    'featured_image' => 2,
                ],
                [
                    'title' => 'Historic City',
                    'slug' => 'historic-city',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'A city filled with rich history and beautiful architecture.',
                    'featured_image' => 3,
                ],
                [
                    'title' => 'Desert Safari',
                    'slug' => 'desert-safari',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'A thrilling desert safari experience with sand dunes and camel rides.',
                    'featured_image' => 4,
                ],
                [
                    'title' => 'Tropical Island',
                    'slug' => 'tropical-island',
                    'status' => 0,
                    'country_id' => 1,
                    'description' => 'A secluded tropical island with breathtaking views and serene beaches.',
                    'featured_image' => 5,
                ],
                [
                    'title' => 'Rainforest Retreat',
                    'slug' => 'rainforest-retreat',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'A peaceful retreat surrounded by lush rainforest and wildlife.',
                    'featured_image' => 6,
                ],
                [
                    'title' => 'Snowy Mountain Resort',
                    'slug' => 'snowy-mountain-resort',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'A winter wonderland with ski slopes and cozy lodges.',
                    'featured_image' => 7,
                ],
                [
                    'title' => 'Vineyard Escape',
                    'slug' => 'vineyard-escape',
                    'status' => 1,
                    'country_id' => 1,
                    'description' => 'A tranquil escape to a vineyard with wine tasting and scenic views.',
                    'featured_image' => 8,
                ]
        ]);
    }
}
