<?php

namespace App\Http\Controllers;

use App\Modules\Catalog\Actions\ShowProductAction;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug, ShowProductAction $action): View
    {
        $product = $action->execute($slug);

        return view('storefront.show', compact('product'));
    }
}
