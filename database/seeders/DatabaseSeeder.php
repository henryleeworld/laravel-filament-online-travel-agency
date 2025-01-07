<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            GeoobjectSeeder::class,
            FacilityCategorySeeder::class,
            FacilitySeeder::class,
            ApartmentTypeSeeder::class,
            RoomTypeSeeder::class,
            BedTypeSeeder::class,
            PropertySeeder::class,
            ApartmentSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
