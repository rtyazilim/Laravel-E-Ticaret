<?php

use App\Modules\User\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/admin')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/stats', [AdminController::class, 'dashboardStats']);
});
