<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;

class TomatoInvoices extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Invoices');
        $this->description('Invoices Generator and Management for Tomato PHP');
        $this->package('tomatophp/tomato-invoices');
        $this->module('tomatophp/tomato-invoices-module');
        $this->command('tomato-invoices:install');
    }
}
