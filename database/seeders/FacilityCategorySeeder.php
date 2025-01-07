<?php

namespace Database\Seeders;

use App\Models\FacilityCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilityCategorySeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        FacilityCategory::create(['name' => __('Bedroom')]);
        FacilityCategory::create(['name' => __('Kitchen')]);
        FacilityCategory::create(['name' => __('Bathroom')]);
        FacilityCategory::create(['name' => __('Room Amenities')]);
        FacilityCategory::create(['name' => __('General')]);
        FacilityCategory::create(['name' => __('Media & Technology')]);
    }
}
