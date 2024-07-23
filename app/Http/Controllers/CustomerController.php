<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Address\Country;
use App\Models\Address\Ph\PhRegion;
use App\Models\Address\State;
use App\Models\Address\Us\UsState;
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
            'states' => UsState::orderBy('name', 'asc')->get(),
            'regions' => PhRegion::orderBy('name', 'asc')->get(),
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
            'phone' => $data['phone_full'],
            'email' => $data['email'],
            'country_code' => $data['country_code'],
        ]);

        // store address binded with customer_id
        $address = $customer->address()->create([
            'city_id' => $data['city_id'] ?? null,
            'state_id' => $data['state_id'] ?? null,
            'postal_code' => $data['postal_code'],
            'address_line' => $data['address_line'],
            'country_id' => $data['country'],
            'barangay_id' => $data['barangay_id'] ?? null,
            'region_id' => $data['region_id'] ?? null,
        ]);

        Session::flash('customer.created', 'Customer created');
        Session::put('customer', $customer);

        return redirect()->route('order-return.index');
    }

    public function customer()
    {
        return view('customer.index');
    }
}