<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/customer')
    ->middleware(['api'])
    ->group(function () {
        // Customer routes
    });
