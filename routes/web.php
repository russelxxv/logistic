<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function() {
    Session::forget('customer');
    Session::forget('unknown_client');
    Session::save();
});

require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/order_return.php';
require __DIR__.'/manage_order_return.php';
require __DIR__.'/manage_customer.php';
require __DIR__.'/unknown_client.php';