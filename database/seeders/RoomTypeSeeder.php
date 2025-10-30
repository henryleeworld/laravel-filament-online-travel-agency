<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        RoomType::create(['name' => __('Bedroom')]);
        RoomType::create(['name' => __('Living room')]);
    }
}
