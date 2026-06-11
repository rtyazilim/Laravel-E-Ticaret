<?php

namespace App\Core\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

abstract class BaseEvent
{
    use Dispatchable, SerializesModels;

    public readonly string $eventId;
    public readonly string $occurredAt;

    public function __construct()
    {
        $this->eventId = (string) Str::uuid();
        $this->occurredAt = now()->toIso8601String();
    }
}
