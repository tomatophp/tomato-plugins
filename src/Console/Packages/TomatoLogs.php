<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoLogs extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Logs');
        $this->description('Log Viewer for TomatoPHP using Laravel Log Reader');
        $this->package('tomatophp/tomato-logs');
        $this->command('tomato-logs:install');
    }
}
