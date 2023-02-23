<?php

namespace Cooper\CustomMake\Commands;

class ServiceMakeCommand extends MakeCommand
{
    protected $name = 'make:service';

    protected $description = 'Create a new Service class';

    protected $type = 'Service';

    public static string $dir = 'Services';
}