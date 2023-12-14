<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoThemes extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Themes');
        $this->description('A Theme System Like Wordpress on your Tomato Admin');
        $this->package('tomatophp/tomato-themes');
        $this->command('tomato-themes:install');
    }
}
