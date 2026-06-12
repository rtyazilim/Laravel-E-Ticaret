<?php

namespace App\Modules\Cart\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\Session;

class RemoveFromCartAction extends BaseAction
{
    public function execute(mixed ...$args): void
    {
        [$productId] = $args;

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }
    }
}
