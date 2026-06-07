<?php

use App\Modules\Payment\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/payments')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/init', [PaymentController::class, 'init']);
});

Route::post('api/payments/webhook', [PaymentController::class, 'webhook']);
