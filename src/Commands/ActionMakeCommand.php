<?php

namespace Cooper\CustomMake\Commands;

class ActionMakeCommand extends MakeCommand
{
    protected $name = 'make:action';

    protected $description = 'Create a new Action class';

    protected $type = 'Action';

    public static string $dir = 'Actions';
}