<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run()
    {
        $uae = Country::where('code', 'UAE')->first();

        $states = [
            ['name' => 'Abu Dhabi', 'code' => 'AD'],
            ['name' => 'Dubai', 'code' => 'DU'],
            ['name' => 'Sharjah', 'code' => 'SH'],
            ['name' => 'Ajman', 'code' => 'AJ'],
            ['name' => 'Fujairah', 'code' => 'FU'],
            ['name' => 'Ras Al Khaimah', 'code' => 'RA'],
            ['name' => 'Umm Al Quwain', 'code' => 'UQ'],
        ];

        foreach ($states as $state) {
            State::create([
                'country_id' => $uae->id,
                'name' => $state['name'],
                'code' => $state['code'],
            ]);
        }
    }
}

