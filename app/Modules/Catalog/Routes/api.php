<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/catalog')
    ->middleware(['api'])
    ->group(function () {
        // Catalog routes
    });
