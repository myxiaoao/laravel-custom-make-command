<?php

namespace Cooper\CustomMake\Commands;

class DaoMakeCommand extends MakeCommand
{
    protected $name = 'make:dao';

    protected $description = 'Create a new DAO class';

    protected $type = 'DAO';

    public static string $dir = 'DAOs';
}