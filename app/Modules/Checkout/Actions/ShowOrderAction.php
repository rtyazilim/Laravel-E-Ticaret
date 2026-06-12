<?php

namespace App\Modules\Checkout\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Checkout\Repositories\OrderRepository;

class ShowOrderAction extends BaseAction
{
    public function __construct(private readonly OrderRepository $orderRepository) {}

    public function execute(mixed ...$args): \App\Models\Order
    {
        [$id] = $args;
        return $this->orderRepository->findByIdWithItems($id);
    }
}
