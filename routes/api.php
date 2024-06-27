<?php

use Illuminate\Support\Facades\Route;

/** City routes */
Route::prefix('/v1/address')->group(base_path('routes/api/address.routes.php'));