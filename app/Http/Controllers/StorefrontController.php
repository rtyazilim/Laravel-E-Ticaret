<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Modules\Catalog\Actions\ListProductsAction;
use Illuminate\View\View;

class StorefrontController extends Controller
{
    public function index(ListProductsAction $action): View
    {
        try {
            if (file_exists(base_path('bootstrap/cache/config.php'))) {
                unlink(base_path('bootstrap/cache/config.php'));
            }
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        } catch (\Exception $e) {}

        $products = $action->execute();

        return view('storefront.index', compact('products'));
    }
}
