<?php

namespace Cooper\CustomMake;

use Composer\InstalledVersions;
use Cooper\CustomMake\Commands\ActionMakeCommand;
use Cooper\CustomMake\Commands\DaoMakeCommand;
use Cooper\CustomMake\Commands\RepositoryMakeCommand;
use Cooper\CustomMake\Commands\ServiceMakeCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    protected array $folders;

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ActionMakeCommand::class,
                ServiceMakeCommand::class,
                RepositoryMakeCommand::class,
                DaoMakeCommand::class
            ]);
        }

        if (class_exists(AboutCommand::class) && class_exists(InstalledVersions::class)) {
            AboutCommand::add('Custom Make Command', [
                'Version' => InstalledVersions::getPrettyVersion('cooper/laravel-custom-make-command'),
                'Created' => function (): string {
                    $createPaths = collect($this->folders)
                        ->filter(fn(string $folder): bool => is_dir(app_path($folder)));

                    if (!$createPaths->count()) {
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

    public function commands($commands): void
    {
        parent::commands($commands);

        if (is_array($commands)) {
            foreach ($commands as $command) {
                $this->folders[] = $command::$dir;
            }
        }
    }
}