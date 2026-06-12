<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StorefrontController::class, 'index'])->name('storefront.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('storefront.show');

Route::get('/setup-db', function() {
    $envPath = base_path('.env');
    $envExamplePath = base_path('.env.example');

    if (!file_exists($envPath) && file_exists($envExamplePath)) {
        copy($envExamplePath, $envPath);
    }

    if (!file_exists($envPath)) {
        return "No .env found";
    }

    $env = file_get_contents($envPath);
    $updates = [
        'DB_CONNECTION' => 'mysql',
        'DB_HOST' => '127.0.0.1',
        'DB_PORT' => '3306',
        'DB_DATABASE' => 'rtyazil1_laravel',
        'DB_USERNAME' => 'rtyazil1_laravel_merkez',
        'DB_PASSWORD' => '"9gPWkqy9PLwWH+t"'
    ];

    foreach ($updates as $key => $value) {
        if (preg_match("/^{$key}=.*/m", $env)) {
            $env = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $env);
        } else {
            $env .= "\n{$key}={$value}";
        }
    }

    file_put_contents($envPath, $env);
    return ".env successfully updated for MySQL production!";
});

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

