<?php

namespace Inveteratus\Neon;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'neon:install';
    protected $description = 'Install relevant dependencies and stubs';

    public function handle(): void
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('css'));
        copy(__DIR__ . '/resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/resources/css/neon.css', resource_path('css/neon.css'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        copy(__DIR__ . '/resources/js/app.js', resource_path('js/app.js'));

        copy(__DIR__ . '/stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/stubs/vite.config.js', base_path('vite.config.js'));

        $this->addComposerPackages([
            'livewire/livewire',
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
