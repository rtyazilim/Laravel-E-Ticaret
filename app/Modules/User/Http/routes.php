<?php

use App\Modules\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(function (): void {
        Route::apiResource('users', UserController::class);
    });
