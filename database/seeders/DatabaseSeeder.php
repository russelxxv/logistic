<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Address\Psgc;
use Database\Seeders\Address\USAddress;
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
            UserSeeder::class,
            CountriesSeeder::class,
            ProductCategorySeeder::class,
            ReturnReasonSeeder::class,
            // OrderReturnSeeder::class,
            PhoneCountryCodeSeeder::class,
            Psgc::class,
            USAddress::class,
        ]);

    }
}
