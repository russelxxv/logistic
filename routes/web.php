<?php

use App\Http\Controllers\ManageOrderReturnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ManageOrderReturnController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->controller(ManageOrderReturnController::class)->name('manage-order-return.')->group(function() {
//     Route::get('/', 'index')->name('index');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/order_return.php';