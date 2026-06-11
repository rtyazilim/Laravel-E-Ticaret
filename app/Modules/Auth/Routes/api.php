<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/v1/auth')
    ->middleware(['api'])
    ->group(function () {
        // Auth routes
    });
