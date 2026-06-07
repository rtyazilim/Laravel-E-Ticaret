<?php

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cart\Application\Services\CartService;
use App\Modules\Order\Application\Services\OrderService;
use App\Support\ApiResponse;
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
        return ApiResponse::success($orders, 'Orders retrieved successfully');
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->getOrderByIdForUser($id, Auth::id());
        return ApiResponse::success($order, 'Order retrieved successfully');
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
            
            return ApiResponse::success($order, 'Order created successfully', 201);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage(), [], 400);
        }
    }
}
