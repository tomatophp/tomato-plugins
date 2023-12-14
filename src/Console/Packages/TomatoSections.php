<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoSections extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Sections');
        $this->description('Sections For Tomato Themes To build any app with Theme Builder');
        $this->package('tomatophp/tomato-sections');
        $this->command('tomato-sections:install');
    }
}
