<?php

namespace App\Http\Controllers;

use App\Modules\Product\Application\Services\ProductService;
use App\Modules\Product\Application\Services\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected ProductService $productService;
    protected CategoryService $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAllActiveProducts();
        $categories = $this->categoryService->getAllCategories();

        return view('home', compact('products', 'categories'));
    }
}
