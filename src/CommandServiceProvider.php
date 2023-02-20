<?php

namespace Cooper\CustomMake;

use Cooper\CustomMake\Commands\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ServiceMakeCommand::class,
            ]);
        }
    }

    public function register(): void
    {
    }
}