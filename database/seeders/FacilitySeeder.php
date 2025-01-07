<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        Facility::create(['category_id' => 1, 'name' => __('Linen')]);
        Facility::create(['category_id' => 1, 'name' => __('Wardrobe or closet')]);
        Facility::create(['category_id' => 2, 'name' => __('Electric kettle')]);
        Facility::create(['category_id' => 2, 'name' => __('Microwave')]);
        Facility::create(['category_id' => 2, 'name' => __('Washing mashine')]);
        Facility::create(['category_id' => 3, 'name' => __('Private bathroom')]);
        Facility::create(['category_id' => 3, 'name' => __('Shower')]);
        Facility::create(['category_id' => 3, 'name' => __('Towels')]);
        Facility::create(['category_id' => 4, 'name' => __('Drying rack for clothing')]);
        Facility::create(['category_id' => 5, 'name' => __('No smoking')]);
        Facility::create(['category_id' => 5, 'name' => __('Fan')]);
        Facility::create(['category_id' => 6, 'name' => __('WiFi')]);
        Facility::create(['category_id' => 6, 'name' => __('TV')]);

        // Property facilities:
        Facility::create(['name' => __('Family rooms')]);
        Facility::create(['name' => __('Free WiFi')]);
        Facility::create(['name' => __('Parking')]);
        Facility::create(['name' => __('Pets allowed')]);
        Facility::create(['name' => __('Swimming pool')]);
    }
}
