<?php

namespace TomatoPHP\TomatoPlugins;

use Illuminate\Support\ServiceProvider;


class TomatoPluginsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoPlugins\Console\TomatoPluginsInstall::class,
        ]);

    }

    public function boot(): void
    {
        //you boot methods here
    }
}
