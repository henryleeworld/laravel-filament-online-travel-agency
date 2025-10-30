<?php

namespace Database\Seeders;

use App\Models\Geoobject;
use Illuminate\Database\Seeder;

class GeoobjectSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Geoobject::create([
            'city_id' => 1,
            'name' => __('Taipei 101'),
            'lat' => 25.033964,
            'long' => 121.564468
        ]);

        Geoobject::create([
            'city_id' => 2,
            'name' => __('Statue of Liberty'),
            'lat' => 40.689247,
            'long' => -74.044502
        ]);

        Geoobject::create([
            'city_id' => 3,
            'name' => __('Big Ben'),
            'lat' => 51.500729,
            'long' => -0.124625
        ]);
    }
}
