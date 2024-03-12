<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoArtisan extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Artisan');
        $this->description('Artisan terminal to run artisan commands using GUI');
        $this->package('tomatophp/tomato-artisan');
        $this->module('tomatophp/tomato-artisan-module');
        $this->command('tomato-artisan:install');
    }
}
