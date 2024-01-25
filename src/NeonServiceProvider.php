<?php

namespace Inveteratus\Neon;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class NeonServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::anonymousComponentPath(__DIR__ . '/resources/views/components', 'neon');

        $this->commands([InstallCommand::class]);
    }
}
