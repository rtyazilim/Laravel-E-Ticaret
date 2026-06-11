<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/finance')
    ->middleware(['api'])
    ->group(function () {
        // Finance routes
    });
