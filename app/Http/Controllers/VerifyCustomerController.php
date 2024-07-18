<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class VerifyCustomerController extends Controller
{
    public function index(): View
    {
        return view('verify-index');
    }

    public function checkEmail(VerifyCustomerRequest $request)
    {
        $validated = $request->validated();

        $customer = Customer::where('email', $validated['email'])->get();

        if ($customer->count() === 0) {
            Session::put('unknown_client', false);
            return redirect()->route('customer.create');
        } else {
            Session::put('unknown_client', true);
            Session::put('customer', $customer->first());
            return redirect()->route('order-return.index');
        }

        // is true exists in customer table
        // then assign
        // Session::put('unknown_client', false);

        //otherwise
    }
}
