<?php

namespace Database\Seeders;

use App\Models\ApartmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        ApartmentType::create(['name' => __('Entire apartment')]);
        ApartmentType::create(['name' => __('Entire studio')]);
        ApartmentType::create(['name' => __('Private suite')]);
    }
}
