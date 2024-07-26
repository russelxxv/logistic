<?php

use App\Http\Controllers\OrderReturnController;
use Illuminate\Support\Facades\Route;

Route::middleware(['enrolled.customer'])->prefix('/order-return')->controller(OrderReturnController::class)->name('order-return.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('', 'store')->name('store');
    Route::get('created', 'created')->name('created');
    Route::get('close', 'closeSession')->name('close');
});

// Route::get('/order', [OrderReturnController::class, 'order']);