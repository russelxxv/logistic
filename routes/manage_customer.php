<?php

use App\Http\Controllers\Admin\ManageCustomerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('/manage-customer')->controller(ManageCustomerController::class)->name('manage-customer.')->group(function () {
    Route::put('{id}', 'update')->name('update');
});