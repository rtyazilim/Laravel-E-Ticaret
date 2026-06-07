<?php

namespace App\Modules\Order\Application\Services;

use App\Modules\Cart\Domain\Models\Cart;
use App\Modules\Order\Domain\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;

class OrderService
{
    public function createOrderFromCart(Cart $cart, array $shippingAddress, ?array $billingAddress = null): Order
    {
        if ($cart->items->isEmpty()) {
            throw new Exception("Cart is empty");
        }

        return DB::transaction(function () use ($cart, $shippingAddress, $billingAddress) {
            
            $totalAmount = 0;
            
            // Calculate total and prepare items
            $orderItemsData = [];
            foreach ($cart->items as $item) {
                // Stock Check & Decrement (Basic Hook)
                if ($item->product->stock < $item->quantity) {
                    throw new Exception("Not enough stock for product: " . $item->product->name);
                }
                
                $item->product->decrement('stock', $item->quantity);

                $subtotal = $item->quantity * $item->product->price;
                $totalAmount += $subtotal;

                // Price Snapshot
                $orderItemsData[] = [
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'unit_price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $subtotal,
                ];
            }

            // Create Order
            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                'user_id' => $cart->user_id,
                'status' => 'pending',
                'total_amount' => $totalAmount,
                'shipping_address' => json_encode($shippingAddress),
                'billing_address' => json_encode($billingAddress ?? $shippingAddress),
            ]);

            // Create Order Items
            $order->items()->createMany($orderItemsData);

            // Clear Cart
            $cart->items()->delete();

            return $order;
        });
    }

    public function getOrdersForUser(int $userId)
    {
        return Order::where('user_id', $userId)->with('items')->orderBy('created_at', 'desc')->get();
    }

    public function getOrderByIdForUser(int $orderId, int $userId): Order
    {
        return Order::where('id', $orderId)->where('user_id', $userId)->with('items')->firstOrFail();
    }
}
