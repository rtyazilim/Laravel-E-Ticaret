<?php

namespace App\Modules\Shared\Domain;

use Illuminate\Database\Eloquent\Model;

abstract class BaseEntity extends Model
{
    protected $guarded = ['id'];
}
