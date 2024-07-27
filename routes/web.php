<?php

use App\Events\CreatedOrderReturn;
use App\Events\UpdateOrderReturn;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Models\OrderReturn;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function() {
    // return dd('nani');
    // return CreatedOrderReturn::dispatch(OrderReturn::where('id', 1)->get()->first());
    // return UpdateOrderReturn::dispatch(OrderReturn::where('id', 1)->get()->first());
    Session::forget('customer');
    Session::forget('unknown_client');
    Session::forget('otp');
    Session::forget('customer_email');
    Session::forget('needs_verification');
    Session::save();

    // dd(str_pad(rand(0,99999), 5, "0", STR_PAD_LEFT));
});

require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/order_return.php';
require __DIR__.'/manage_order_return.php';
require __DIR__.'/manage_customer.php';
require __DIR__.'/unknown_client.php';