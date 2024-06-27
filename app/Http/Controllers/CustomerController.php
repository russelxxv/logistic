<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Address\Country;
use App\Models\Address\State;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function create(): View
    {
        return view('customer.create', [
            'countries' => Country::all(),
            'states' => State::all(),
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();

        dd($data);

        // $customer = Customer::create($data);

        // return $customer;
    }
}