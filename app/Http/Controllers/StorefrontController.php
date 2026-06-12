<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Modules\Catalog\Actions\ListProductsAction;
use Illuminate\View\View;

class StorefrontController extends Controller
{
    public function index(ListProductsAction $action): View
    {
        $products = $action->execute();

        return view('storefront.index', compact('products'));
    }
}
