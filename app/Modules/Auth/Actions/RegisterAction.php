<?php

namespace App\Modules\Auth\Actions;

use App\Core\Actions\BaseAction;
use App\Models\User;
use App\Modules\Auth\DTOs\RegisterDTO;
use App\Modules\Auth\Services\AuthService;

class RegisterAction extends BaseAction
{
    public function __construct(
        private readonly AuthService $authService,
    ) {}

    public function execute(mixed ...$args): array
    {
        /** @var RegisterDTO $dto */
        [$dto] = $args;

        $user  = $this->authService->createUser($dto->name, $dto->email, $dto->password);
        $token = $this->authService->createToken($user, $dto->device_name);

        return [
            'token' => $token,
            'user'  => $this->userPayload($user),
        ];
    }

    private function userPayload(User $user): array
    {
        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames(),
        ];
    }
}
