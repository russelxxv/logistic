<?php

namespace Database\Seeders\Address;

use App\Models\Address\Ph\PhBarangay;
use App\Models\Address\Ph\PhCity;
use App\Models\Address\Ph\PhMunicipality;
use App\Models\Address\Ph\PhProvince;
use App\Models\Address\Ph\PhRegion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class Psgc extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PSGC Seeders
        $this->barangay();
        $this->city();
        $this->municipality();
        $this->province();
        $this->region();
    }

    /**
     * Barangay
     */
    private function barangay(): void
    {
        $rawData = file_get_contents(base_path('database/dumps/address/ph/barangay.json'));
        $barangays = json_decode($rawData, true);

        // $barangs = [];
        foreach ($barangays as $brgy) {
            $barangs = Arr::except($brgy, ['created_at', 'updated_at', 'status']);
            PhBarangay::create($barangs);
        }
        
    }

    /**
     * City
     */
    private function city(): void        
    {
        $rawData = file_get_contents(base_path('database/dumps/address/ph/cities.json'));
        $cities = json_decode($rawData, true);

        // $cityData = [];
        foreach ($cities as $city) {
            $cityData = Arr::except($city, ['created_at', 'updated_at', 'status', 'type']);
            PhCity::create($cityData);
        }
        
    }

    /**
     * Municipality
     */
    private function municipality(): void
    {
        $rawData = file_get_contents(base_path('database/dumps/address/ph/municipalities.json'));
        $municipalities = json_decode($rawData, true);

        // $muniData = [];
        foreach ($municipalities as $munici) {
            $muniData = Arr::except($munici, ['created_at', 'updated_at', 'type']);
            PhMunicipality::create($muniData);
        }
        
    }

    /**
     * Province
     */
    private function province(): void
    {
        $rawData = file_get_contents(base_path('database/dumps/address/ph/province.json'));
        $provinces = json_decode($rawData, true);

        // $provData = [];
        foreach ($provinces as $prov) {
            $provData = Arr::except($prov, ['created_at', 'updated_at']);
            PhProvince::create($provData);
        }
        
    }

    /**
     * Region
     */
    private function region(): void
    {
        $rawData = file_get_contents(base_path('database/dumps/address/ph/region.json'));
        $regions = json_decode($rawData, true);

        // $regionData = [];
        foreach ($regions as $reg) {
            $regionData = Arr::except($reg, ['created_at', 'updated_at']);
            PhRegion::create($regionData);
        }
    }
}
