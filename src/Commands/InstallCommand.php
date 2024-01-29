<?php

namespace Inveteratus\Neon\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'neon:install';
    protected $description = 'Install relevant dependencies and stubs';

    public function handle(): void
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('css/neon'));
        copy(__DIR__ . '/../Stubs/resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/../Stubs/resources/css/neon/components.css', resource_path('css/neon/components.css'));
        copy(__DIR__ . '/../Stubs/resources/css/neon/views.css', resource_path('css/neon/views.css'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        copy(__DIR__ . '/../Stubs/resources/js/app.js', resource_path('js/app.js'));

        (new Filesystem)->ensureDirectoryExists(base_path('routes'));
        copy(__DIR__ . '/../Stubs/routes/neon.php', base_path('routes/neon.php'));
        copy(__DIR__ . '/../Stubs/routes/web.php', base_path('routes/web.php'));

        (new Filesystem)->ensureDirectoryExists(resource_path('views/components/layouts'));
        copy(__DIR__ . '/../Stubs/resources/views/components/layouts/app.blade.php', resource_path('views/components/layouts/app.blade.php'));
        copy(__DIR__ . '/../Stubs/resources/views/index.blade.php', resource_path('views/index.blade.php'));
        copy(__DIR__ . '/../Stubs/resources/views/home.blade.php', resource_path('views/home.blade.php'));

        copy(__DIR__ . '/../Stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../Stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../Stubs/vite.config.js', base_path('vite.config.js'));

        $this->addComposerPackages([
            'livewire/livewire',
            'blade-ui-kit/blade-heroicons',
        ]);

        $this->addNodePackages([
            '@tailwindcss/forms',
            'autoprefixer',
            'postcss',
            'tailwindcss',
            '@fontsource/nunito-sans',
        ]);
    }

    private function addComposerPackages(array $packages, bool $dev = false): void
    {
        $command = array_merge(['composer', 'require'], $packages, $dev ? ['--dev'] : []);

        $this->runProcess($command, ['COMPOSER_MEMORY_LIMIT' => '-1']);
    }

    private function addNodePackages(array $packages, bool $dev = true): void
    {
        $command = array_merge(['npm', 'install'], $dev ? ['--save-dev'] : [], $packages);

        $this->runProcess($command);
    }

    private function runProcess(array $command, ?array $environment = null): void
    {
        (new Process($command, base_path(), $environment))
            ->setTimeout(null)
            ->run(function ($type, $line) {
                $this->output->write($line);
            });
    }
}
