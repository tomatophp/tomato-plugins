<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoEcommerceTheme extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Ecommerce Theme');
        $this->description('Ecommerce, Blog, CMS Theme For TomatoPHP Modules System');
        $this->package('tomatophp/tomato-ecommerce-theme');
        $this->module('tomatophp/one-theme-theme');
    }
}
