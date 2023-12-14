<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoBrowser extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Browser');
        $this->description('Browser to the files inside your app build for TomatoPHP');
        $this->package('tomatophp/tomato-browser');
        $this->command('tomato-browser:install');
    }
}
