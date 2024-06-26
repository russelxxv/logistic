<?php

namespace Database\Seeders;

use App\Models\Address\Country;
use App\Models\Address\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::insert([
            [
                'country_id' => Country::first()->id,
                'code' => 'sone',
                'name' => 'State One',
            ],
            [
                'country_id' => Country::first()->id,
                'code' => 'stwo',
                'name' => 'State Two',
            ]
        ]);
    }
}
