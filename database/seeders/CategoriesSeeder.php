<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Seed the categories table.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Sports'],
            ['title' => 'Science'],
            ['title' => 'Health'],
            ['title' => 'Travel'],
            ['title' => 'Food'],
        ];

        DB::table('categories')->insert($categories);
    }
}
