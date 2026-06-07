<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Load Module Routes
require base_path('app/Modules/Auth/Http/routes.php');
require base_path('app/Modules/User/Http/routes.php');
require base_path('app/Modules/Product/Http/routes.php');
require base_path('app/Modules/Cart/Http/routes.php');
require base_path('app/Modules/Order/Http/routes.php');
require base_path('app/Modules/Payment/Http/routes.php');
