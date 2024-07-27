<?php

use App\Http\Controllers\VerifyCustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/verify')->controller(VerifyCustomerController::class)->name('verify.')->group(function () {

    Route::middleware(['verify.otp'])->group(function() {
        Route::get('', 'index')->name('index');
        Route::post('', 'checkEmail')->name('customer-email');
        // Route::post('', 'confirm')->name('email');
    });

    Route::middleware(['unknown_client'])->group(function() {
        Route::get('/verify-otp', 'verifyOtp')->name('otp');
        Route::get('/resend-otp', 'resendOtp')->name('resend-otp');
        Route::post('/check-otp', 'checkOTP')->name('check-otp');
    });
});