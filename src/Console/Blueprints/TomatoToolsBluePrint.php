<?php

namespace TomatoPHP\TomatoPlugins\Console\Blueprints;


class TomatoToolsBluePrint extends Blueprint
{
    public function __construct()
    {

        $this->label('Tomato Tools Blueprint');
        $this->packages([
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoPHP::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoBackup::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoLogs::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoBrowser::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoArtisan::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoForms::class,
        ]);
    }
}
