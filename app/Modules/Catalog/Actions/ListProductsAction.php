<?php

namespace App\Modules\Catalog\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Catalog\DTOs\ProductListDTO;
use App\Modules\Catalog\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ListProductsAction extends BaseAction
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(mixed ...$args): LengthAwarePaginator
    {
        $paginator = $this->productRepository->paginateActive(12);

        $paginator->getCollection()->transform(function ($product) {
            return ProductListDTO::fromModel($product);
        });

        return $paginator;
    }
}
