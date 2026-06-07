<?php

namespace App\Modules\User\Domain\Enums;

enum UserStatus: string
{
    case Active = 'active';
    case Passive = 'passive';
    case Banned = 'banned';
}
