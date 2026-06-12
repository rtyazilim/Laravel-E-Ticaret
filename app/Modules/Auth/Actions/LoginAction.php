<?php

namespace App\Modules\Auth\Actions;

use App\Core\Actions\BaseAction;
use App\Models\User;
use App\Modules\Auth\DTOs\LoginDTO;
use App\Modules\Auth\Services\AuthService;

class LoginAction extends BaseAction
{
    public function __construct(
        private readonly AuthService $authService,
    ) {}

    public function execute(mixed ...$args): array
    {
        /** @var LoginDTO $dto */
        [$dto] = $args;

        $user  = $this->authService->validateCredentials($dto->email, $dto->password);
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
