<?php

use App\Http\Controllers\VerifyCustomerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/verify')->controller(VerifyCustomerController::class)->name('verify.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('', 'checkEmail')->name('customer-email');
    // Route::post('', 'confirm')->name('email');
});