<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoForms extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Forms');
        $this->description('Build a full Forms with Fields on Database and save it to user meta');
        $this->package('tomatophp/tomato-forms');
        $this->module('tomatophp/tomato-forms-module');
        $this->command('tomato-forms:install');
    }
}
