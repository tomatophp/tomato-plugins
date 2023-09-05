<?php

namespace TomatoPHP\TomatoPlugins;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;
use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;


class TomatoPluginsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\TomatoPlugins\Console\TomatoPluginsInstall::class,
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-plugins');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-plugins');

        $this->mergeConfigFrom(__DIR__.'/../config/tomato-plugins.php', 'tomato-plugins');

        $this->publishes([
            __DIR__.'/../config/tomato-plugins.php' => config_path('tomato-plugins.php'),
        ], 'tomato-plugins-config');

    }

    public function boot(): void
    {
        if((bool)config('tomato-plugins.active_ui')){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

            TomatoMenu::register([
                Menu::make()
                    ->group(__('Settings'))
                    ->label(__('Plugins'))
                    ->route('admin.plugins.index')
                    ->icon('bx bxs-plug')
            ]);
        }
    }
}
