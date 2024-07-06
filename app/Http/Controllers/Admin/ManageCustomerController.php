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
        // Customer::update($validated);

        Session::flash('customer.updated', 'Customer updated');
        return redirect()->back();
    }
}