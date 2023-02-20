<?php

namespace Cooper\CustomMake\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

abstract class MakeCommand extends GeneratorCommand
{
    protected string $dir;

    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/class.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\\' . $this->dir;
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    protected function qualifyClass($name): string
    {
        $name = ltrim($name, '\\/');

        $name = str_replace('/', '\\', $name);

        $name = collect(explode('\\', $name))->map(function ($name) {
            return Str::studly($name);
        })->implode('\\');

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name . $this->type;
        }

        return $this->qualifyClass(
            $this->getDefaultNamespace(trim($rootNamespace, '\\')) . '\\' . $name
        );
    }
}