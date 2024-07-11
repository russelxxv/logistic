<?php

use App\Http\Controllers\Admin\ManageOrderReturnController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ManageOrderReturnController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('/manage-order-return')->controller(ManageOrderReturnController::class)->name('manage-order-return.')->group(function () {
    Route::put('/status/{id}', 'receivedOrderReturn')->name('update.status');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('{id}', 'update')->name('update');
});