<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoBranches\Models\Branch;
use TomatoPHP\TomatoBranches\Models\Company;
use TomatoPHP\TomatoLocations\Models\Country;
use function \Laravel\Prompts\info;

class TomatoBranches extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Branches');
        $this->description('Branches/Company Management for TomatoPHP');
        $this->package('tomatophp/tomato-branches');
        $this->module('tomatophp/tomato-branches-module');
        $this->command('tomato-branches:install');
    }
}
