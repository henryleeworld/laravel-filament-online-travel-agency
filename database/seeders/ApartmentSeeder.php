<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Property;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $propertyMin = Property::min('id');
        $propertyMax = Property::max('id');

        $apartments = [];
        for ($i = 1; $i <= 100; $i++) {
            $apartments[] = [
                'property_id' => rand($propertyMin, $propertyMax),
                'name' => __('Apartment') . ' ' . $i,
                'capacity_adults' => rand(1, 5),
                'capacity_children' => rand(1, 5),
            ];

            if ($i % 500 == 0 || $i == 100) {
                Apartment::insert($apartments);
                $apartments = [];
            }
        }
    }
}
