<?php

namespace App\Modules\Checkout\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Catalog\Repositories\ProductRepository;
use App\Modules\Checkout\Repositories\OrderRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class CreateOrderAction extends BaseAction
{
    public function __construct(
        private readonly OrderRepository $orderRepository,
        private readonly ProductRepository $productRepository,
        private readonly CalculateOrderTotalAction $calculateOrderTotalAction
    ) {}

    public function execute(mixed ...$args): \App\Models\Order
    {
        $userId = $args[0] ?? null;
        
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            throw ValidationException::withMessages(['cart' => 'Sepetiniz boş.']);
        }

        // DB'den güncel fiyatlarla total hesapla
        $totalPrice = $this->calculateOrderTotalAction->execute();

        return DB::transaction(function () use ($cart, $userId, $totalPrice) {
            
            // 1. Order oluştur
            $order = $this->orderRepository->create([
                'user_id' => $userId,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // 2. Order items oluştur ve stok düş (opsiyonel)
            foreach ($cart as $productId => $item) {
                // Fiyatı DB'den tekrar çek
                $product = $this->productRepository->findByIdActive($productId);
                
                $order->items()->create([
                    'product_id' => $product->id,
                    'price' => $product->price, // Gerçek fiyat DB'den
                    'quantity' => $item['quantity'],
                ]);
            }

            // 3. Sepeti temizle
            Session::forget('cart');

            return $order;
        });
    }
}
