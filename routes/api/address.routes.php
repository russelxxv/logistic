<?php

use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\PhAddressController;
use App\Http\Controllers\Address\UsCityController;
use App\Http\Controllers\Address\UsStateController;

Route::controller(UsStateController::class)->prefix('/us-state')->name('us-state.')->group(function () {
    Route::get('', 'fetch')->name('fetch');
});


Route::controller(UsCityController::class)->prefix('/us-city')->name('us-city.')->group(function () {
    Route::get('', 'fetch')->name('fetch');
});


Route::controller(PhAddressController::class)->prefix('/ph')->name('ph.')->group(function() {
    // Route::get('provinces', 'fetchProvince')->name('fetch.provinces');
    // Route::get('municipalities', 'fetchMunicipality')->name('fetch.municipalities');
    Route::post('search-barangay', 'searchPsgc')->name('fetch.search_psgc');
});