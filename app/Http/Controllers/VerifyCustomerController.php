<?php

namespace App\Http\Controllers;

use App\Events\VerifyCustomerEmail;
use App\Http\Requests\VerifyCustomerRequest;
use App\Models\Customer;
use App\Rules\VerifyCustomerOtpRule;
use Carbon\Carbon;
use Closure;
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
            Session::put('customer_email', $validated['email']);
            return redirect()->route('customer.create');
        } else {
            Session::put('unknown_client', true);
            // Session::put('customer', $customer->first());

            Session::put('needs_verification', true);
            $otp = str_pad(rand(0,99999), 5, "0", STR_PAD_LEFT);
            Session::put('otp', $otp);
            Session::put('customer_email', $validated['email']);

            VerifyCustomerEmail::dispatch($customer->first(), $otp);

            return redirect()->route('verify.otp');
        }

        // is true exists in customer table
        // then assign
        // Session::put('unknown_client', false);

        //otherwise
    }

    public function verifyOtp()
    {
        return view('verify-otp');
    }

    public function checkOTP(VerifyCustomerRequest $request)
    {
        $validated = $request->validated();

        $customer = Customer::where('email', Session::get('customer_email'))->get()->first();
        $customer->email_verified_at = Carbon::now();
        $customer->save();
        Session::put('customer', $customer);

        Session::forget('customer_email');
        Session::forget('needs_verification');
        Session::forget('otp');
        Session::save();

        return redirect()->route('order-return.index');
    }

    public function resendOtp()
    {
        $otp = str_pad(rand(0,99999), 5, "0", STR_PAD_LEFT);
        $email = Session::get('customer_email');
        $customer = Customer::where('email', $email)->get();
        Session::put('otp', $otp);

        VerifyCustomerEmail::dispatch($customer->first(), $otp);

        return redirect()->back();
    }
}
