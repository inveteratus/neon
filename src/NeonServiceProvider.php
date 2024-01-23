<?php

namespace Inveteratus\Neon;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class NeonServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::anonymousComponentPath(__DIR__ . '/resources/views/components', 'neon');

        $this->publishes([
            __DIR__ . '/resources/css/neon.css' => resource_path('css/neon.css'),
        ], 'neon-assets');
    }
}
