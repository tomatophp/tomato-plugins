<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoSubscription extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Subscription');
        $this->description('Plan subscription with selected features to build a feature control plan for Tomato');
        $this->package('tomatophp/tomato-subscription');
        $this->command('tomato-subscription:install');
    }
}
