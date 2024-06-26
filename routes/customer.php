<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('/customer')->controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('create', 'create')->name('create');
});