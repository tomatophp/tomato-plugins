<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoCategory extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Category');
        $this->description('manage category/tags/types for any model with splade/tomato PHP');
        $this->package('tomatophp/tomato-category');
        $this->module('tomatophp/tomato-category-module');
        $this->command('tomato-category:install');
    }
}
