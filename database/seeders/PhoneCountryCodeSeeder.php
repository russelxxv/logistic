<?php

namespace Database\Seeders;

use App\Models\PhoneCountryCode;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneCountryCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhoneCountryCode::insert([
            [
                'code' => 'PH',
                'phone_code' => '63',
                'name' => 'Philippines',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'US',
                'phone_code' => '1',
                'name' => 'United States',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
