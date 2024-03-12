<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoCms extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato CMS');
        $this->description('full CMS System to manage your content build for Tomato PHP');
        $this->package('tomatophp/tomato-cms');
        $this->module('tomatophp/tomato-cms-module');
        $this->command('tomato-cms:install');
    }
}
