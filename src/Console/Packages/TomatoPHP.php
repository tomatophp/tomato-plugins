<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoPHP extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato PHP Generator');
        $this->description('Tomato PHP is a Full CRUD Generator for Splade & Breeze Starter Kit');
        $this->package('tomatophp/tomato-php');
        $this->command('tomato-php:install');
    }
}
