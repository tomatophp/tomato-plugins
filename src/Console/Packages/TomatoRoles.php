<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoRoles extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Roles');
        $this->description('ACL Roles / Permissions for TomatoPHP build with Splade build with Laravel-permission');
        $this->package('tomatophp/tomato-roles');
        $this->module('tomatophp/tomato-roles-module');
        $this->command('tomato-roles:install');
    }

    /**
     * @return void
     */
    public function custom(): void
    {
        warning('add [use HasRoles;] to your User model');
        warning('email: admin@admin.com');
        warning('password: password');
    }
}
