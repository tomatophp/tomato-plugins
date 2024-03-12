<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoNotifications extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Notifications');
        $this->description('Laravel Notifications Channel with GUI to send notifications with templates for TomatoPHP build with Splade');
        $this->package('tomatophp/tomato-notifications');
        $this->module('tomatophp/tomato-notifications-module');
        $this->command('tomato-notifications:install');
    }

    public function custom(): void
    {
        warning('add [use InteractWithNotifications;] to your User model');
        warning('up queue by use [php artisan queue:work]');
    }
}
