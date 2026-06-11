<?php

namespace App\Core\Repositories;

use App\Core\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function findById(string $id): ?object
    {
        return $this->model->find($id);
    }

    public function findAll(array $filters = [], int $perPage = 20): object
    {
        $query = $this->model->newQuery();

        foreach ($filters as $field => $value) {
            $query->where($field, $value);
        }

        return $query->paginate($perPage);
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): object
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record->fresh();
    }

    public function delete(string $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
}
