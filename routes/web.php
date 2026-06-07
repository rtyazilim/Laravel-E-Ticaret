<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\HomeController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth (Mock Routes for UI Preview)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return redirect('/admin');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function () {
    return redirect('/admin');
});

Route::post('/logout', function () {
    return redirect('/login');
})->name('logout');


// Storefront
Route::get('/products', function () {
    return view('products.index');
});

Route::get('/product/{slug}', function ($slug) {
    return view('products.show', compact('slug'));
});

// Cart & Checkout
Route::get('/cart', function () {
    return view('cart.index');
});

Route::get('/checkout', function () {
    return view('checkout.index');
});

// Orders
Route::get('/orders', function () {
    return view('orders.index');
});

Route::get('/orders/show', function () {
    return view('orders.show');
});


// Admin Dashboard
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    
    // Admin stubs for sidebar
    Route::get('/orders', function () {
        return view('admin.dashboard'); // placeholder
    });
    Route::get('/products', function () {
        return view('admin.dashboard'); // placeholder
    });
    Route::get('/users', function () {
        return view('admin.dashboard'); // placeholder
    });
});
