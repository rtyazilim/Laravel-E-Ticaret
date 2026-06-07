<?php

namespace App\Modules\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cart\Application\Services\CartService;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    private function getSessionId(Request $request): string
    {
        if (!$request->session()->has('cart_session_id')) {
            $request->session()->put('cart_session_id', Str::uuid()->toString());
        }
        return $request->session()->get('cart_session_id');
    }

    public function index(Request $request): JsonResponse
    {
        $cart = $this->cartService->getCartForUser(Auth::id(), $this->getSessionId($request));
        
        $subtotal = $cart->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        $cartData = $cart->toArray();
        $cartData['meta'] = ['subtotal' => round($subtotal, 2)];

        return ApiResponse::success($cartData, 'Cart retrieved successfully');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->cartService->getCartForUser(Auth::id(), $this->getSessionId($request));
        $item = $this->cartService->addItem($cart, $validated['product_id'], $validated['quantity']);

        return ApiResponse::success($item, 'Item added to cart', 201);
    }

    public function update(Request $request, int $itemId): JsonResponse
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = $this->cartService->updateItemQuantity($itemId, $validated['quantity']);
        
        return ApiResponse::success($item, 'Cart item updated');
    }

    public function destroy(int $itemId): JsonResponse
    {
        $this->cartService->removeItem($itemId);
        return ApiResponse::success([], 'Item removed from cart', 200);
    }
}
