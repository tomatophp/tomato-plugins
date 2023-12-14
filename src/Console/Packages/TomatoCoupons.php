<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoCoupons extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Coupons');
        $this->description('Offers and coupons, gift cards manager for TomatoPHP e-commerce system.');
        $this->package('tomatophp/tomato-coupons');
        $this->command('tomato-coupons:install');
    }
}
