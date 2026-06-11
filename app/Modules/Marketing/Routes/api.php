<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/marketing')
    ->middleware(['api'])
    ->group(function () {
        // Marketing routes
    });
