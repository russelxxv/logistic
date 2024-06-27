<?php

use App\Http\Controllers\Address\CityController;

Route::controller(CityController::class)->group(function () {
    /** @uses CityController::fetch */
    Route::get('cities', 'fetch')->name('cities.fetch');
});