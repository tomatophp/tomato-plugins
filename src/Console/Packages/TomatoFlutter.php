<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoFlutter extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Flutter');
        $this->description('Build a Flutter App Using Artisan Command');
        $this->package('tomatophp/tomato-flutter');
        $this->command('tomato-flutter:install');
    }
}
