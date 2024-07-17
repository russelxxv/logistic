<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\ApiController;
use App\Http\Requests\AddressRequest;
use App\Models\Address\Ph\PhBarangay;
use App\Models\Address\Ph\PhMunicipality;
use App\Models\Address\Ph\PhProvince;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PhAddressController extends ApiController
{
    /**
     * Fetch provinces
     */
    public function fetchProvince(AddressRequest $request): JsonResponse
    {
        $param = $request->validated();

        $provinces = PhProvince::where('region_id', $param['region_id'])->orderBy('name', 'asc')->get();

        return $this->success(['data' => $provinces], Response::HTTP_OK);
    }

    /**
     * Fetch Municiaplities
     */
    public function fetchMunicipality(AddressRequest $request): JsonResponse
    {
        $param = $request->validated();

        $municipalities = PhMunicipality::where('region_id', $param['region_id'])->orderBy('name', 'asc')->get();

        return $this->success(['data' => $municipalities], Response::HTTP_OK);
    }

    /**
     * Fetch City or Provnce 
     */
    public function searchPsgc(AddressRequest $request): JsonResponse
    {
        $param = $request->validated();
        $term = $param['term'];
        $result = [];

        $query = PhBarangay::query();
        $query->select('ph_barangays.id', 'ph_barangays.name AS barangay', 'ph_cities.name AS city', 'ph_municipalities.name AS municipality', 'ph_provinces.name AS province');
        $query->leftJoin('ph_cities', 'ph_barangays.city_municipality_id', '=', 'ph_cities.id');
        $query->leftJoin('ph_municipalities', 'ph_barangays.city_municipality_id', '=', 'ph_municipalities.id');
        $query->leftJoin('ph_provinces', 'ph_barangays.province_id', '=', 'ph_provinces.id');
        $query->whereAny([
            'ph_barangays.name',
            'ph_cities.name',
            'ph_municipalities.name',
            'ph_provinces.name',
        ],'like', "$term%");

        $qs = $query->get();
        foreach($qs as $q) {
            $result[] = [
                'id' => $q->id,
                'text' => trim("{$q->barangay} {$q->city} {$q->municipality} {$q->province}")
            ];
        }
        
        return $this->success(['data' => $result], Response::HTTP_OK);
    }
}
