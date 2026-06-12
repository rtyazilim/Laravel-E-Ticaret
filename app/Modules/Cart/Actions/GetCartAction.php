<?php

namespace App\Modules\Cart\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\Session;

class GetCartAction extends BaseAction
{
    public function execute(mixed ...$args): array
    {
        return Session::get('cart', []);
    }
}
