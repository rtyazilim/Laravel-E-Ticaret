<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StorefrontController::class, 'index'])->name('storefront.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('storefront.show');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

use App\Http\Controllers\CheckoutController;

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
});

use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
});

