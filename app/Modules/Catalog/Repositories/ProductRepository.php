<?php

namespace App\Modules\Catalog\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as ManualPaginator;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function paginateActive(int $perPage = 12): LengthAwarePaginator
    {
        try {
            return $this->model
                ->where('is_active', true)
                ->latest()
                ->paginate($perPage);
        } catch (\Exception $e) {
            // DB bağlantısı yoksa boş paginator döndür
            return new ManualPaginator(
                new Collection([]),
                0,
                $perPage,
                1
            );
        }
    }
}
