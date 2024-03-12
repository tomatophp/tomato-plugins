<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoLocations extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Locations');
        $this->description('Database seeds for Locations plugin for TomatoPHP');
        $this->package('tomatophp/tomato-locations');
        $this->module('tomatophp/tomato-locations-module');
        $this->command('tomato-locations:install');
    }
}
