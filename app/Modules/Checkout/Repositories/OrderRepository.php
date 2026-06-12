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
}
