<?php

namespace App\Modules\Product\Application\Services;

use App\Modules\Product\Domain\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getAllActiveProducts(): Collection
    {
        return Product::where('is_active', true)->with(['category', 'images'])->get();
    }

    public function getProductById(int $id): ?Product
    {
        return Product::with(['category', 'images'])->findOrFail($id);
    }

    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }

    public function updateProduct(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct(int $id): bool
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}
