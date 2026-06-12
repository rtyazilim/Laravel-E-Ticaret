<?php

namespace App\Http\Controllers;

use App\Modules\Cart\Actions\AddToCartAction;
use App\Modules\Cart\Actions\GetCartAction;
use App\Modules\Cart\Actions\RemoveFromCartAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(GetCartAction $action): View
    {
        $cart = $action->execute();
        
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, AddToCartAction $action): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|uuid'
        ]);

        $action->execute($request->input('product_id'));

        return redirect()->route('cart.index')->with('success', 'Ürün sepete eklendi.');
    }

    public function remove(string $id, RemoveFromCartAction $action): RedirectResponse
    {
        $action->execute($id);

        return redirect()->route('cart.index')->with('success', 'Ürün sepetten çıkarıldı.');
    }
}
