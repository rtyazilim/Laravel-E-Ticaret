<?php

namespace App\Modules\Auth\Application\Services;

use App\Modules\Shared\Application\BaseService;
use App\Modules\User\Domain\Enums\UserRole;
use App\Modules\User\Domain\Enums\UserStatus;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService extends BaseService
{
    public function __construct(private readonly UserRepository $users)
    {
    }

    public function register(array $data): array
    {
        $user = $this->users->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'] ?? null,
            'role' => UserRole::Customer->value,
            'status' => UserStatus::Active->value,
        ]);

        return [
            'user' => $user,
            'token' => $user->createToken('api')->plainTextToken,
        ];
    }

    public function login(array $credentials): array
    {
        $user = $this->users->findByEmail($credentials['email']);

        if (! $user instanceof User || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials.'],
            ]);
        }

        if ($user->status !== UserStatus::Active) {
            throw ValidationException::withMessages([
                'email' => ['User account is not active.'],
            ]);
        }

        return [
            'user' => $user,
            'token' => $user->createToken('api')->plainTextToken,
        ];
    }

    public function logout(User $user): void
    {
        $user->currentAccessToken()?->delete();
    }
}
