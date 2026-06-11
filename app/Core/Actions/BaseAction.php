<?php

namespace App\Core\Actions;

abstract class BaseAction
{
    abstract public function execute(mixed ...$args): mixed;
}
