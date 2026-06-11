<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/inventory')
    ->middleware(['api'])
    ->group(function () {
        // Inventory routes
    });
