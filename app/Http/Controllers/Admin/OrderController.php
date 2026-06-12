<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Checkout\Actions\ListOrdersAction;
use App\Modules\Checkout\Actions\ShowOrderAction;
use App\Modules\Checkout\Actions\UpdateOrderStatusAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(ListOrdersAction $action): View
    {
        $orders = $action->execute();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(string $id, ShowOrderAction $action): View
    {
        $order = $action->execute($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, string $id, UpdateOrderStatusAction $action): RedirectResponse
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        try {
            $action->execute($id, $request->input('status'));
            return back()->with('success', 'Sipariş durumu güncellendi.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'Durum güncellenirken bir hata oluştu.');
        }
    }
}
