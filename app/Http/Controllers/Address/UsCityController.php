<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\ApiController;
use App\Http\Requests\AddressRequest;
use App\Models\Address\Us\UsCity;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UsCityController extends ApiController
{
    public function fetch(AddressRequest $request): JsonResponse
    {
        $param = $request->validated();

        $cities = UsCity::where('state_id', $param['state_id'])->orderBy('name', 'asc')->get();

        return $this->success(['data' => $cities], Response::HTTP_OK);
    }
}