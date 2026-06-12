<?php

namespace App\Modules\Checkout\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Checkout\Repositories\OrderRepository;

class ListOrdersAction extends BaseAction
{
    public function __construct(private readonly OrderRepository $orderRepository) {}

    public function execute(mixed ...$args): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->orderRepository->paginateWithUser(15);
    }
}
