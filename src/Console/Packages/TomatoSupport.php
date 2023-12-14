<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoSupport extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Support');
        $this->description('Ticketing and support system with API for tomato admin');
        $this->package('tomatophp/tomato-support');
        $this->command('tomato-support:install');
    }
}
