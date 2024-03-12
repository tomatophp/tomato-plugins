<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoEcommerce extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Ecommerce');
        $this->description('a full frontend/backend e-commerce system built on top of TomatoPHP, with Cart functions and ordering functions');
        $this->package('tomatophp/tomato-ecommerce');
        $this->module('tomatophp/tomato-ecommerce-module');
        $this->command('tomato-ecommerce:install');
    }

    public function custom(): void
    {
        warning('add [use InteractsWithEcommerce;] to your Account model');
        warning('you can download Ecommerce theme form this repo');
        warning('https://github.com/tomatophp/Ecommerce');
    }
}
