<?php

namespace Database\Seeders;

use App\Models\Address\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::insert([
            [
                'code' => 'US',
                'name' => 'United States',
            ],
            // [
            //     'code' => 'PH',
            //     'name' => 'Philippines',
            // ]
        ]);
    }
}
