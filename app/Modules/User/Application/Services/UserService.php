<?php

namespace App\Modules\User\Application\Services;

use App\Modules\Shared\Application\BaseService;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Infrastructure\Repositories\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService extends BaseService
{
    public function __construct(private readonly UserRepository $users)
    {
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->users->paginate($perPage);
    }

    public function create(array $data): User
    {
        return $this->users->create($data);
    }

    public function find(int $id): User
    {
        $user = $this->users->find($id);

        if (! $user instanceof User) {
            throw new ModelNotFoundException('User not found.');
        }

        return $user;
    }

    public function update(int $id, array $data): User
    {
        return $this->users->update($this->find($id), $data);
    }

    public function delete(int $id): void
    {
        $this->users->delete($this->find($id));
    }
}
