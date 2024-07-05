<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Address\Country;
use App\Models\Address\State;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
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
        
        // store customer details
        $customer = Customer::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'retailer_name' => $data['retailer_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        // store address binded with customer_id
        $address = $customer->address()->create([
            'city_id' => $data['city_id'],
            'state_id' => $data['state_id'],
            'postal_code' => $data['postal_code'],
            'address_line' => $data['address_line'],
            'country_id' => $data['country'],
        ]);

        Session::flash('customer.created', 'Customer created');
        Session::put('customer', $customer);

        return redirect()->route('order-return.index');
    }
}