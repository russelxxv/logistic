<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\ApiController;
use App\Http\Requests\CityRequest;
use App\Models\Address\City;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CityController extends ApiController
{
    public function fetch(CityRequest $request): JsonResponse
    {
        $param = $request->validated();

        $cities = City::where('state_id', $param['state_id'])->get();

        return $this->success(['data' => $cities], Response::HTTP_OK);
    }
}
