<?php

namespace Database\Seeders;

use App\Models\Address\City;
use App\Models\Address\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::insert([
            [
                'state_id' => State::first()->id,
                'code' => 'cone',
                'name' => 'City One',
            ],
            [
                'state_id' => State::skip(1)->first()->id,
                'code' => 'ctwo',
                'name' => 'City Two',
            ]
        ]);
    }
}
