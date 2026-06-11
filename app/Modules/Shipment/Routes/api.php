<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/shipment')
    ->middleware(['api'])
    ->group(function () {
        // Shipment routes
    });
