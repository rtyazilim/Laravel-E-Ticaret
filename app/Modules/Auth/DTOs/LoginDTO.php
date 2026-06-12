<?php

namespace App\Modules\Auth\DTOs;

use App\Core\DTOs\BaseDTO;

final class LoginDTO extends BaseDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly string $device_name = 'api',
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            email: $data['email'],
            password: $data['password'],
            device_name: $data['device_name'] ?? 'api',
        );
    }
}
