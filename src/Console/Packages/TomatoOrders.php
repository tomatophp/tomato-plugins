<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoOrders extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Orders');
        $this->description('full ordering and shipping system management with invoices templates for TomatoPHP');
        $this->package('tomatophp/tomato-orders');
        $this->command('tomato-orders:install');
    }

    public function custom(): void
    {
        warning('add [use InteractsWithOrders;] to your Account model');
    }
}
