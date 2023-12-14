<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoFigma extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Figma');
        $this->description('Plugin to convert figma file to HTML/CSS/TailwindCSS/Flutter Style');
        $this->package('tomatophp/tomato-figma');
        $this->command('tomato-figma:install');
    }
}
