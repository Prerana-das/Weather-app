<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            [
                'name' => 'Abu Dhabi',
                'country_id' => 1,
                'longitude' => 54.37,
                'latitude' => 24.47,
                'zip' => '12345',
            ],
            [
                'name' => 'Dubai',
                'country_id' => 1,
                'longitude' => 55.27,
                'latitude' => 25.28,
                'zip' => '54321',
            ],
            [
                'name' => 'Sharjah',
                'country_id' => 1,
                'longitude' => 55.39,
                'latitude' => 25.36,
                'zip' => '98765',
            ],
            [
                'name' => 'London',
                'country_id' => 2,
                'longitude' => -0.1276,
                'latitude' => 51.5072,
                'zip' => 'SW1A 1AA',
            ],
            [
                'name' => 'New York',
                'country_id' => 3,
                'longitude' => -74.0060,
                'latitude' => 40.7128,
                'zip' => '10001',
            ],
            [
                'name' => 'Tokyo',
                'country_id' => 4,
                'longitude' => 139.6917,
                'latitude' => 35.6895,
                'zip' => '100-0005',
            ],

        ];

        DB::table('cities')->insert($city);
    }
}
