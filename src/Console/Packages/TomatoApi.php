<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoApi extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato API');
        $this->description('Full API CRUD Generator build on repository pattern');
        $this->package('tomatophp/tomato-api');
        $this->command('tomato-api:install');
    }
}
