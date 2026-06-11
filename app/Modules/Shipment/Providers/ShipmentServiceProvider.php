<?php

namespace App\Modules\Shipment\Providers;

use Illuminate\Support\ServiceProvider;

class ShipmentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/shipment.php', 'shipment'
        );
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}
