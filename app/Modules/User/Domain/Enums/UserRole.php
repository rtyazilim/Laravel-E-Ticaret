<?php

namespace App\Modules\User\Domain\Enums;

enum UserRole: string
{
    case Customer = 'customer';
    case Manager = 'manager';
    case Admin = 'admin';
}
