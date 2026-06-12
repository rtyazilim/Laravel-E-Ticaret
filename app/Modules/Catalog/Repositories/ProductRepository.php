<?php

namespace App\Modules\Catalog\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function paginateActive(int $perPage = 12): LengthAwarePaginator
    {
        return $this->model
            ->where('is_active', true)
            ->latest()
            ->paginate($perPage);
    }
}
