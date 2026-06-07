<?php

namespace App\Modules\Cart\Application\Services;

use App\Modules\Cart\Domain\Models\Cart;
use App\Modules\Cart\Domain\Models\CartItem;
use App\Modules\Product\Domain\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getCartForUser(?int $userId, string $sessionId): Cart
    {
        $query = Cart::query();
        
        if ($userId) {
            $query->where('user_id', $userId);
        } else {
            $query->where('session_id', $sessionId)->whereNull('user_id');
        }

        return $query->with('items.product')->firstOrCreate([
            'user_id' => $userId,
            'session_id' => $userId ? null : $sessionId,
        ]);
    }

    public function addItem(Cart $cart, int $productId, int $quantity): CartItem
    {
        $product = Product::findOrFail($productId);
        
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return $cartItem;
    }

    public function updateItemQuantity(int $itemId, int $quantity): CartItem
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->update(['quantity' => $quantity]);
        return $cartItem;
    }

    public function removeItem(int $itemId): bool
    {
        $cartItem = CartItem::findOrFail($itemId);
        return $cartItem->delete();
    }

    public function clearCart(Cart $cart): void
    {
        CartItem::where('cart_id', $cart->id)->delete();
    }
}
