<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Country::create(['name' => __('Taiwan'), 'lat' => 23.5, 'long' => 121]);
        Country::create(['name' => __('United States'), 'lat' => 37.09024, 'long' => -95.712891]);
        Country::create(['name' => __('United Kingdom'), 'lat' => 55.378051, 'long' => -3.435973]);
    }
}
