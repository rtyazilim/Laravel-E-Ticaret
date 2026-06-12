<?php

namespace App\Modules\Auth\Services;

use App\Core\Services\BaseService;
use App\Core\Exceptions\DomainException;
use App\Models\User;
use App\Modules\Auth\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}

    public function validateCredentials(string $email, string $password): User
    {
        $user = $this->userRepository->findByEmail($email);

        if (! $user || ! Hash::check($password, $user->password)) {
            throw new DomainException('Kimlik bilgileri hatalı.');
        }

        return $user;
    }

    public function createToken(User $user, string $deviceName): string
    {
        $user->tokens()->where('name', $deviceName)->delete();

        return $user->createToken($deviceName)->plainTextToken;
    }

    public function createUser(string $name, string $email, string $password): User
    {
        if ($this->userRepository->existsByEmail($email)) {
            throw new DomainException('Bu e-posta adresi zaten kayıtlı.');
        }

        /** @var User $user */
        $user = $this->userRepository->create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);

        $this->assignDefaultRole($user);

        return $user;
    }

    public function revokeToken(User $user, string $deviceName): void
    {
        $user->tokens()->where('name', $deviceName)->delete();
    }

    private function assignDefaultRole(User $user): void
    {
        if (! $user->hasAnyRole(['admin', 'manager', 'staff', 'customer', 'viewer'])) {
            $user->assignRole('customer');
        }
    }
}
