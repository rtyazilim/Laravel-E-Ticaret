<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function dashboard(): View
    {
        $recent_orders = Order::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();
        return view('account.dashboard', compact('recent_orders'));
    }

    public function orders(): View
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(15);
        return view('account.orders.index', compact('orders'));
    }

    public function orderShow(string $id): View
    {
        $order = Order::where('user_id', auth()->id())
            ->with('items.product')
            ->findOrFail($id);
        return view('account.orders.show', compact('order'));
    }

    public function profile(Request $request): View
    {
        $user = $request->user();
        return view('account.profile', compact('user'));
    }
}
