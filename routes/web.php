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

Route::get('/run-migrations', function () {
    try {
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
        // Force the configuration dynamically at runtime to avoid all caching and .env issues
        config(['database.default' => 'mysql']);
        config(['database.connections.mysql.host' => 'localhost']);
        config(['database.connections.mysql.database' => 'rtyazil1_laravel']);
        config(['database.connections.mysql.username' => 'rtyazil1_laravel_merkez']);
        config(['database.connections.mysql.password' => '9gPWkqy9PLwWH+t']);
        
        \Illuminate\Support\Facades\DB::purge('mysql');
        \Illuminate\Support\Facades\DB::reconnect('mysql');
        
        // Manually drop all tables to simulate migrate:fresh robustly
        \Illuminate\Support\Facades\Schema::withoutForeignKeyConstraints(function () {
            $tables = \Illuminate\Support\Facades\DB::select('SHOW TABLES');
            foreach ($tables as $table) {
                $tableName = get_object_vars($table);
                $tableName = reset($tableName);
                \Illuminate\Support\Facades\DB::statement("DROP TABLE IF EXISTS `$tableName`");
            }
        });
        
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        $migrateOutput = \Illuminate\Support\Facades\Artisan::output();
        
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        $seedOutput = \Illuminate\Support\Facades\Artisan::output();
        
        return "Migrations:<br><pre>$migrateOutput</pre><br>Seeders:<br><pre>$seedOutput</pre>";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage() . "<br>Trace:<br><pre>" . $e->getTraceAsString() . "</pre>";
    }
});

Route::get('/debug-env', function () {
    $envPath = base_path('.env');
    $envContent = file_exists($envPath) ? file_get_contents($envPath) : 'No .env found';
    
    $configPath = config_path('database.php');
    $configContent = file_exists($configPath) ? htmlspecialchars(file_get_contents($configPath)) : 'No database.php found';
    
    $config = config('database.connections.mysql');
    $default = config('database.default');
    
    return "<pre>DEFAULT DB: $default\n\nMYSQL CONFIG: " . print_r($config, true) . "\n\nDATABASE.PHP:\n$configContent\n\nENV FILE:\n$envContent</pre>";
});

Route::get('/fix-db', function () {
    $envPath = base_path('.env');
    if (!file_exists($envPath)) return 'No .env';
    
    $content = file_get_contents($envPath);
    
    // Replace the specific lines
    $content = preg_replace('/^DB_HOST=.*$/m', 'DB_HOST=localhost', $content);
    $content = preg_replace('/^DB_DATABASE=.*$/m', 'DB_DATABASE=rtyazil1_laravel', $content);
    $content = preg_replace('/^DB_USERNAME=.*$/m', 'DB_USERNAME=rtyazil1_laravel_merkez', $content);
    $content = preg_replace('/^DB_PASSWORD=.*$/m', 'DB_PASSWORD="9gPWkqy9PLwWH+t"', $content);
    
    file_put_contents($envPath, $content);
    
    // Clear cache
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    
    return 'Fixed .env and cleared config cache.';
});

// Checkout
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
});

// Customer Auth
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post')->middleware('throttle:5,1');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout.post');

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
