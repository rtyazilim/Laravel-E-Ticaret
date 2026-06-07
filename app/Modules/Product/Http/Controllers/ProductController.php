<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Application\Services\ProductService;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        $products = $this->productService->getAllActiveProducts();
        return ApiResponse::success($products, 'Products retrieved successfully');
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productService->getProductById($id);
        return ApiResponse::success($product, 'Product retrieved successfully');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $product = $this->productService->createProduct($validated);
        return ApiResponse::success($product, 'Product created successfully', 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:products,slug,' . $id,
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $product = $this->productService->updateProduct($id, $validated);
        return ApiResponse::success($product, 'Product updated successfully');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->productService->deleteProduct($id);
        return ApiResponse::success([], 'Product deleted successfully', 200);
    }
}
