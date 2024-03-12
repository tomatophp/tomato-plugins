<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoCrm extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato CRM');
        $this->description('manage category/tags/types for any model with splade/tomato PHP');
        $this->package('tomatophp/tomato-crm');
        $this->module('tomatophp/tomato-crm-module');
        $this->command('tomato-crm:install');
    }

    public function custom(): void
    {
        warning('you can publish you Account Model');
        warning('php artisan vendor:publish --tag="tomato-crm-model"');
        warning('and you need to add a guard on auth.php config');
    }
}
