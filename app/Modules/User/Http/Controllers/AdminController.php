<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\Domain\Models\Order;
use App\Modules\Product\Domain\Models\Product;
use App\Modules\User\Domain\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboardStats(): JsonResponse
    {
        $stats = [
            'total_users' => User::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'paid')->sum('total_amount'),
            'active_products' => Product::where('is_active', true)->count(),
        ];

        return ApiResponse::success($stats, 'Dashboard stats retrieved successfully');
    }
}
