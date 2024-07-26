<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['unknown_client', 'guest'])->prefix('/customer')->controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
});

// Route::get('/cus', [CustomerController::class, 'customer']);