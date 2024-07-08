<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManageCustomerController extends Controller
{
    /**
     * Update a customer info
     */
    public function update(ManageCustomerRequest $request, $id)
    {
        $validated = $request->validated();
        $customer = Customer::findOrFail($id);
        $customer->update($validated);

        Session::flash('customer.updated', 'Customer updated');
        return redirect()->back();
    }

    /**
     * Update customer address
     */
    public function addressUpdate(ManageCustomerRequest $request, $id)
    {
        $validated = $request->validated();

        $customer = Customer::findOrFail($id);

        $address = $customer->address()->update([
            'address_line' => $validated['address_line'],
            'city_id' => $validated['city'],
            'state_id' => $validated['state'],
            'country_id' => $validated['country'],
            'postal_code' => $validated['postal_code'],
        ]);
        
        Session::flash('customer_address.updated', 'Address updated');
        return redirect()->back();
    }
}