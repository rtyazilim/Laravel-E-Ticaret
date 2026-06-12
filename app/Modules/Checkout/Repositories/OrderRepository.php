<?php

namespace App\Modules\Checkout\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Models\Order;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function paginateWithUser(int $perPage = 15)
    {
        return $this->model->with('user')->latest()->paginate($perPage);
    }

    public function findByIdWithItems(string $id): ?Order
    {
        return $this->model->with(['items.product', 'user'])->findOrFail($id);
    }
}
