<?php

namespace App\Modules\Auth\Actions;

use App\Core\Actions\BaseAction;
use App\Models\User;
use App\Modules\Auth\Services\AuthService;

class LogoutAction extends BaseAction
{
    public function __construct(
        private readonly AuthService $authService,
    ) {}

    public function execute(mixed ...$args): bool
    {
        /** @var User $user */
        /** @var string $deviceName */
        [$user, $deviceName] = $args;

        $this->authService->revokeToken($user, $deviceName);

        return true;
    }
}
