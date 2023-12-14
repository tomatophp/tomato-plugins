<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoWallet extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Wallet');
        $this->description('Account Wallet Manager & Payment Integrations For TomatoPHP and TomatoCRM');
        $this->package('tomatophp/tomato-wallet');
        $this->command('tomato-wallet:install');
    }

    public function custom(): void
    {
        warning('impalement Wallet interface in your Account model');
        warning('add [use HasWallet;] to your Account model');
    }
}
