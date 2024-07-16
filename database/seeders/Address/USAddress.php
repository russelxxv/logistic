<?php

namespace Database\Seeders\Address;

use App\Models\Address\Country;
use App\Models\Address\Us\UsCity;
use App\Models\Address\Us\UsState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class USAddress extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rawData = file_get_contents(base_path('database/dumps/address/us/states_and_cities.json'));
        $json = json_decode($rawData, true);
        $uSCountryId = Country::where('code', 'US')->get()->first()->id;

        // $barangs = [];
        foreach ($json as $state => $cities) {
            $state = UsState::create([
                'country_id' => $uSCountryId,
                // 'code' => strtolower(str_replace(' ', '_', $state)),
                'name' => $state,
            ]);

            foreach ($cities as $city) {
                UsCity::create([
                    'state_id' => $state->id,
                    // 'code' => strtolower(str_replace(' ', '_', $city)),
                    'name' => $city,
                ]);
            }
        }
    }
}
