<?php

namespace App\Modules\Product\Application\Services;

use App\Modules\Product\Domain\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }
}
