<?php

namespace TomatoPHP\TomatoPlugins\Console\Blueprints;

class TomatoCRMBluePrint extends Blueprint
{
    public function __construct()
    {
        $this->label('Tomato CRM Blueprint');
        $this->packages([
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoPHP::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoRoles::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoSettings::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoTranslations::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoLocations::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoNotifications::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoCategory::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoForms::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoMenus::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoCrm::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoWallet::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoProducts::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoBranches::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoInvoices::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoSections::class,
            \TomatoPHP\TomatoPlugins\Console\Packages\TomatoThemes::class,
        ]);
    }
}
