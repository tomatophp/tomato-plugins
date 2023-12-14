<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoPos extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato POS');
        $this->description('Full POS system for tomato ordering and inventory');
        $this->package('tomatophp/tomato-pos');
        $this->command('tomato-pos:install');
    }
}
