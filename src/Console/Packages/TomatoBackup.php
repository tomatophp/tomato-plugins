<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoBackup extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Backup');
        $this->description('Backup plugin for TomatoPHP build with spatie laravel-backup');
        $this->package('tomatophp/tomato-backup');
        $this->command('tomato-backup:install');
    }
}
