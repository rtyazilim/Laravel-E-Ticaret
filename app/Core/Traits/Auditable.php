<?php

namespace App\Core\Traits;

trait Auditable
{
    protected static function bootAuditable(): void
    {
        static::created(function ($model) {
            $model->logAudit('created');
        });

        static::updated(function ($model) {
            $model->logAudit('updated', $model->getDirty());
        });

        static::deleted(function ($model) {
            $model->logAudit('deleted');
        });
    }

    protected function logAudit(string $action, array $changes = []): void
    {
        \DB::table('audit_logs')->insert([
            'id' => (string) \Illuminate\Support\Str::uuid(),
            'auditable_type' => static::class,
            'auditable_id' => $this->getKey(),
            'action' => $action,
            'changes' => json_encode($changes),
            'user_id' => auth()->id(),
            'ip_address' => request()->ip(),
            'created_at' => now(),
        ]);
    }
}
