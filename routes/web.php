<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorefrontController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

// Storefront
Route::get('/', [StorefrontController::class, 'index'])->name('storefront.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('storefront.show');

// Cart
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// Checkout
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
});

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post')->middleware('throttle:5,1');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel
Route::prefix('admin')->middleware(['web', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
});

// User Account Panel
Route::prefix('account')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('account.dashboard');
    Route::get('/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/orders/{id}', [AccountController::class, 'orderShow'])->name('account.orders.show');
    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
});
