<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $country = [
            [
                'name' => 'UAE',
            ],
            [
                'name' => 'UK',
            ],
            [
                'name' => 'USA',
            ],
            [
                'name' => 'Japan',
            ],
        ];

        DB::table('countries')->insert($country);
    }
}
