<?php

namespace Database\Seeders;

use App\Models\Attraction;
use App\Models\Destination;
use App\Models\PageSetting;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {    
        $this->call(VehicleAttributesSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(VehicleTypesSeeder::class);
        $this->call(MetadataSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(TourImageSeeder::class);
        $this->call(VehicleImageSeeder::class);
        $this->call(PostImageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ActivityImageSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(AttractionSeeder::class);
        $this->call(AttractionImageSeeder::class);
        $this->call(PageSettingSeeder::class);
    }
}
