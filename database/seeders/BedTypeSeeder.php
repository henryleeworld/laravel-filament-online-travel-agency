<?php

namespace Database\Seeders;

use App\Models\BedType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        BedType::create(['name' => __('Single bed')]);
        BedType::create(['name' => __('Large double bed')]);
        BedType::create(['name' => __('Extra large double bed')]);
        BedType::create(['name' => __('Sofa bed')]);
    }
}
