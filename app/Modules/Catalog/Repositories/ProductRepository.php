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
            return new ManualPaginator(new Collection([]), 0, $perPage, 1);
        }
    }

    public function findBySlugActive(string $slug): ?Product
    {
        try {
            return $this->model
                ->where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();
        } catch (\Exception $e) {
            // Throw the exception if it's ModelNotFoundException, otherwise return null
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                throw $e;
            }
            abort(500, 'Veritabanı bağlantı hatası');
        }
    }
}
