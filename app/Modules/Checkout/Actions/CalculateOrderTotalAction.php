<?php

namespace App\Modules\Checkout\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Catalog\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class CalculateOrderTotalAction extends BaseAction
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(mixed ...$args): float
    {
        $cart = Session::get('cart', []);
        $total = 0;

        foreach ($cart as $productId => $item) {
            $product = $this->productRepository->findByIdActive($productId);
            $total += $product->price * $item['quantity'];
        }

        return $total;
    }
}
