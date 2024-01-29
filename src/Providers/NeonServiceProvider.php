<?php

namespace Inveteratus\Neon\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Inveteratus\Neon\Commands\InstallCommand;

class NeonServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([InstallCommand::class]);

        Blade::anonymousComponentPath(__DIR__ . '/../Components', 'neon');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'neon');

        $this->publishes([
            __DIR__ . '/../Stubs/resources/css/neon/components.css' => resource_path('css/neon/components.css'),
            __DIR__ . '/../Stubs/resources/css/neon/views.css' => resource_path('css/neon/views.css'),
            __DIR__ . '/../Stubs/routes/neon.php' => base_path('routes/neon.php'),
        ], 'neon-assets');

        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/vendor/neon')
        ], 'neon-views');
    }
}
