<?php

namespace App\Modules\Auth\DTOs;

use App\Core\DTOs\BaseDTO;

final class RegisterDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $device_name = 'api',
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            device_name: $data['device_name'] ?? 'api',
        );
    }
}
