<?php

namespace TomatoPHP\TomatoPlugins\Console\Blueprints;

class TomatoKitBluePrint extends Blueprint
{
    public function __construct()
    {
        $this->label('Tomato Starter Kit Blueprint');
        $this->packages([
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoApi::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoPHP::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoRoles::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoSettings::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoTranslations::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoLocations::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoNotifications::class,
        ]);
    }
}
