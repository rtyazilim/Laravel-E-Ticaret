<?php

namespace App\Modules\User\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\BaseRepository;
use App\Modules\User\Domain\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->newQuery()->where('email', $email)->first();
    }
}
