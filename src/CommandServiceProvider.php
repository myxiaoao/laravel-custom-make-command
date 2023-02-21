<?php

namespace Cooper\CustomMake;

use Cooper\CustomMake\Commands\RepositoryMakeCommand;
use Cooper\CustomMake\Commands\ServiceMakeCommand;
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
    }

    public function register(): void
    {
    }
}