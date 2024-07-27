<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Session;

class VerifyCustomerOtpRule implements ValidationRule
{
    // public string $otp;

    // public function __construct(string $otp)
    // {
    //     $this->otp = $otp;
    // }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $sessionOtp = Session::get('otp');
        // dd($value, Session::get('otp'), $value == $sessionOtp, $value =! $this->otp, $this->otp, $this->otp == $value, session('otp'), session('otp') != $value);
        if ($value != $sessionOtp) {
            $fail("The OTP is incorrect.");
        }
    }
}
