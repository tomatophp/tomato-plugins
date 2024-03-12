<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoSettings extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Settings');
        $this->description('Full Settings Generator / Manager with GUI for TomatoPHP build with Splade build with Laravel-settings');
        $this->package('tomatophp/tomato-settings');
        $this->module('tomatophp/tomato-settings-module');
        $this->command('tomato-settings:install');
    }
}
