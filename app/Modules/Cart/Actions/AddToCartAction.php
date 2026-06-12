<?php

namespace App\Modules\Cart\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Catalog\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class AddToCartAction extends BaseAction
{
    public function __construct(
        private readonly ProductRepository $productRepository
    ) {}

    public function execute(mixed ...$args): void
    {
        [$productId] = $args;

        // DB'den ürünü doğrula
        $product = $this->productRepository->findByIdActive($productId);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $newQuantity = $cart[$productId]['quantity'] + 1;
            // Max limit: 10
            $cart[$productId]['quantity'] = min($newQuantity, 10);
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image_url' => $product->image_url,
            ];
        }

        Session::put('cart', $cart);
    }
}
