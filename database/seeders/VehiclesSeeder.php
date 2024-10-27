<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiclesSeeder extends Seeder
{
    /**
     * Seed the vehicles table.
     *
     * @return void
     */
    public function run()
    {

        $vehicles = [
            [
                'title' => 'Toyota Corolla',
                'slug' => 'toyota-corolla',
                'description' => 'A reliable and efficient compact car.',
                'status' => 'available',
                'price' => 5000,
                'more_fields' => '"{\"values\":[\"Lunch\",\"Lunch\"],\"qna\":[{\"question\":\"What is the car rent?\",\"answer\":\"55$ per person.\"},{\"question\":\"What is the car rent?\",\"answer\":\"55$ per person.\"}]}"',
                'location' => 'New York',
                'vehicle_id' => 1,
            ],
            [
                'title' => 'Ford Mustang',
                'slug' => 'ford-mustang',
                'description' => 'A powerful and sporty muscle car.',
                'status' => 'sold',
                'price' => 15000,
                'more_fields' => '"{\"values\":[\"Lunch\",\"Lunch\"],\"qna\":[{\"question\":\"What is the car rent?\",\"answer\":\"55$ per person.\"},{\"question\":\"What is the car rent?\",\"answer\":\"55$ per person.\"}]}"',
                'location' => 'Los Angeles',
                'vehicle_id' => 2,
            ],
        ];
        DB::table('vehicles')->insert($vehicles);
    }
}
