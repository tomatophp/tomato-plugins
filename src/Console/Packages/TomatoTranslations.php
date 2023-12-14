<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoTranslations extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Translations');
        $this->description('Database Base Translations Keys with Google Translations API Integration');
        $this->package('tomatophp/tomato-translations');
        $this->command('tomato-translations:install');
    }
}
