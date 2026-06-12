<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Modules\Catalog\Actions\ListProductsAction;
use Illuminate\View\View;

class StorefrontController extends Controller
{
    public function index(): View
    {
        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        } catch (\Exception $e) {
            // ignore
        }

        $products = Product::latest()->take(10)->get();

        return view('storefront.index', compact('products'));
    }
}
