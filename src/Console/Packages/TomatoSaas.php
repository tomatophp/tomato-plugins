<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoSaas extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato SaaS');
        $this->description('Build and manage SaaS apps with easy GUI');
        $this->package('tomatophp/tomato-saas');
        $this->command('tomato-saas:install');
    }
}
