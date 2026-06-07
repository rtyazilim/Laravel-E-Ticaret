<?php

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cart\Application\Services\CartService;
use App\Modules\Order\Application\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected OrderService $orderService;
    protected CartService $cartService;

    public function __construct(OrderService $orderService, CartService $cartService)
    {
        $this->orderService = $orderService;
        $this->cartService = $cartService;
    }

    public function index(): JsonResponse
    {
        $orders = $this->orderService->getOrdersForUser(Auth::id());
        return response()->json(['data' => $orders]);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->getOrderByIdForUser($id, Auth::id());
        return response()->json(['data' => $order]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'shipping_address' => 'required|array',
            'billing_address' => 'nullable|array',
        ]);

        $cartSessionId = $request->session()->get('cart_session_id', Str::uuid()->toString());
        $cart = $this->cartService->getCartForUser(Auth::id(), $cartSessionId);

        try {
            $order = $this->orderService->createOrderFromCart(
                $cart, 
                $validated['shipping_address'], 
                $validated['billing_address'] ?? null
            );
            
            return response()->json(['data' => $order], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
