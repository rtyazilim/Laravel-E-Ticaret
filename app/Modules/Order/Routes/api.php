<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/order')
    ->middleware(['api'])
    ->group(function () {
        // Order routes
    });
