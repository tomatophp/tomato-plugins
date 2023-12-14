<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoBuilder extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Builder');
        $this->description('Schema Digram Builder to convert digram to full dashboard and flutter apps CRUDs');
        $this->package('tomatophp/tomato-builder');
        $this->command('tomato-builder:install');
    }

    public function custom(): void
    {
        warning('please run this commands');
        warning('yarn add @vue-flow/background @vue-flow/core @vue-flow/node-toolbar');
        warning('yarn build');
        warning('add this line to your app.js');
        warning('import TomatoDiagram from "../../vendor/tomatophp/tomato-builder/resources/js/components/TomatoDiagram.vue";');
        warning('.component("TomatoDiagram", TomatoDiagram)');
    }
}
