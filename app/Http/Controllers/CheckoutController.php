<?php

namespace App\Http\Controllers;

use App\Modules\Cart\Actions\GetCartAction;
use App\Modules\Checkout\Actions\CalculateOrderTotalAction;
use App\Modules\Checkout\Actions\CreateOrderAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(GetCartAction $getCartAction, CalculateOrderTotalAction $calculateAction): View|RedirectResponse
    {
        $cart = $getCartAction->execute();

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Sepetiniz boş.');
        }

        $total = $calculateAction->execute();

        return view('checkout.checkout', compact('cart', 'total'));
    }

    public function submit(Request $request, CreateOrderAction $action): RedirectResponse
    {
        try {
            $order = $action->execute(Auth::id());
            
            return redirect()->route('storefront.index')->with('success', 'Siparişiniz başarıyla alındı. Sipariş No: ' . $order->id);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('cart.index')->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'Sipariş oluşturulurken bir hata oluştu: ' . $e->getMessage());
        }
    }
}
