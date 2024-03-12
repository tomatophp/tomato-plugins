<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoInventory extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Inventory');
        $this->description('Inventory Management for any type of product with reports and barcode print');
        $this->package('tomatophp/tomato-inventory');
        $this->module('tomatophp/tomato-inventory-module');
        $this->command('tomato-inventory:install');
    }
}
