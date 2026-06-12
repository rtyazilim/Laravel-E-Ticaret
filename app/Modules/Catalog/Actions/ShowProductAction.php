<?php

namespace App\Modules\Catalog\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Catalog\DTOs\ProductDetailDTO;
use App\Modules\Catalog\Repositories\ProductRepository;

class ShowProductAction extends BaseAction
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(mixed ...$args): ProductDetailDTO
    {
        [$slug] = $args;

        $product = $this->productRepository->findBySlugActive($slug);

        return ProductDetailDTO::fromModel($product);
    }
}
