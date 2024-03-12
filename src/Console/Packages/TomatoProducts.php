<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoProducts extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Products');
        $this->description('A Full Products Management With tons of functions and multi variations and prices, stock.');
        $this->package('tomatophp/tomato-products');
        $this->module('tomatophp/tomato-products-module');
        $this->command('tomato-products:install');
    }
}
