<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoDusk extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Dusk');
        $this->description('Laravel Dusk unit test with GUI for Tomato Framework');
        $this->package('tomatophp/tomato-dusk');
        $this->command('tomato-dusk:install');
    }
}
