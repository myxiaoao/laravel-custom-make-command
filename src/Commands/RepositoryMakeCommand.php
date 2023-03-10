<?php

namespace Cooper\CustomMake\Commands;

class RepositoryMakeCommand extends MakeCommand
{
    protected $name = 'make:repository';

    protected $description = 'Create a new Repository class';

    protected $type = 'Repository';

    public static string $dir = 'Repositories';
}