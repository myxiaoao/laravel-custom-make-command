<?php

namespace Cooper\CustomMake;

use Composer\InstalledVersions;
use Cooper\CustomMake\Commands\RepositoryMakeCommand;
use Cooper\CustomMake\Commands\ServiceMakeCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ServiceMakeCommand::class,
                RepositoryMakeCommand::class
            ]);
        }

        if (class_exists(AboutCommand::class) && class_exists(InstalledVersions::class)) {
            AboutCommand::add('Custom Make Command', [
                'Version' => InstalledVersions::getPrettyVersion('cooper/laravel-custom-make-command'),
                'Created' => function (): string {
                    $folders = [
                        'Repositories',
                        'Services'
                    ];
                    $createPaths = collect($folders)
                        ->filter(fn (string $folder): bool => is_dir(app_path($folder)));

                    if (! $createPaths->count()) {
                        return '<fg=green;options=bold>NOT CREATED</>';
                    }

                    return "<fg=red;options=bold>CREATED:</> {$createPaths->join(', ')}";
                },
            ]);
        }
    }

    public function register(): void
    {
    }
}