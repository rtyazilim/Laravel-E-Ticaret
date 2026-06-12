<?php

namespace App\Modules\Catalog\DTOs;

use App\Core\DTOs\BaseDTO;
use App\Models\Product;

final class ProductListDTO extends BaseDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly ?string $short_description,
        public readonly string $formatted_price,
        public readonly string $image_url,
    ) {}

    public static function fromModel(Product $product): self
    {
        return new self(
            id: $product->id,
            name: $product->name,
            slug: $product->slug,
            short_description: \Str::limit($product->short_description ?? $product->description, 60),
            formatted_price: $product->formatted_price,
            image_url: $product->image_url,
        );
    }
}
