<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoMenus extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Menus');
        $this->description('Menus manager to build your menus with json file or database provider');
        $this->package('tomatophp/tomato-menus');
        $this->module('tomatophp/tomato-menus-module');
        $this->command('tomato-menus:install');
    }
}
