<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'title' => 'City activity',
                'slug' => 'city-activity',
                'description' => 'Explore the city with a guided activity.',
                'duration' => '2-3 hours',
                'no_of_people' => '10',
                'destination_id' => '1',
                'attraction_id' => '1',
                'activity_transport' => 'private',
                'public_activity_timings' => '["12:00 AM","01:00 AM","02:00 AM","10:00 PM"]',
                'adult_price' => '100',
                'private_transport_extra_cost' => 100.00,
                'child_price' => '100',
                'location' => 'New York',
                'languages' => json_encode(['English', 'Spanish']),
                'activity_type' => 'half day',
                'long_description' => 'This is a detailed city activity that covers major landmarks in the city.',
                'includes' =>  json_encode(['Guide', 'Snacks']),
                'excludes' => json_encode(['Personal expenses', 'Lunch']),
                'qna' => '[{"question":"What is the car rent?","answer":"55$ per person."},{"question":"activity distance range?","answer":"10KM"}]',
                'other_info' => 'Bring comfortable shoes and a camera.',
                'country_id' => 1,
                'state_id' => 'NY',
            ],
            [
                'title' => 'Mountain Hike',
                'slug' => 'mountain-hike',
                'description' => 'Experience an exhilarating mountain hike.',
                'duration' => 'full day',
                'adult_price' => '100',
                'child_price' => '100',
                'destination_id' => '1',
                'attraction_id' => '2',
                'no_of_people' => '5',
                'activity_transport' => 'sharing',
                'public_activity_timings' => '["12:00 AM","01:00 AM","02:00 AM","10:00 PM"]',
                'location' => 'Colorado',
                'languages' => json_encode(['English']),
                'activity_type' => 'full day',
                'long_description' => 'Join us for a challenging hike up the beautiful mountains.',
                'includes' =>  json_encode(['Guide', 'Snacks']),
                'excludes' => json_encode(['Personal expenses', 'Lunch']),
                'qna' => '[{"question":"What is the car rent?","answer":"55$ per person."},{"question":"activity distance range?","answer":"10KM"}]',
                'other_info' => 'Bring water, snacks, and appropriate clothing.',
                'country_id' => 1,
                'state_id' => 'CO',
                'private_transport_extra_cost' => null,
            ],
        ];


        DB::table('activities')->insert($activities);
    }
}
