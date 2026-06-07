<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        foreach (glob(app_path('Modules/*/Http/{routes,api,web}.php'), GLOB_BRACE) ?: [] as $routeFile) {
            $this->loadRoutesFrom($routeFile);
        }

        $this->loadMigrationsFrom(database_path('migrations'));
    }
}
