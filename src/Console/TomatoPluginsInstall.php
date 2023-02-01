<?php

namespace TomatoPHP\TomatoPlugins\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class TomatoPluginsInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato:plugins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install plugins for tomato framework';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $all = $this->ask('🍅 Do You went to install all plugins for tomato framework? [yes/no]', 'yes');
        if($all === 'y' || $all === 'yes' || $all === null){
            $this->installRoles();
            $this->installComponents();
            $this->installSettings();
            $this->installNotifications();
            $this->installBackup();
            $this->installLog();
            $this->installAPI();
            $this->installLocations();
            $this->installSubscription();
            $this->installTranslations();
            $this->info('🍅 All Tomato Framework Plugins Has Been installed successfully.');
        }
        else {
            $this->info('🍅 Tomato Roles');
            $this->info('ACL Roles / Permissions build on Laravel Spatie Permissions with GUI');
            $install = $this->ask('🍅 Install Tomato Roles? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installRoles();
            }

            $this->info('🍅 Tomato Components');
            $this->info('Tons of components for Splade and tomato php framework');
            $install = $this->ask('🍅 Install Tomato Components? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installComponents();
            }

            $this->info('🍅 Tomato Settings');
            $this->info('Full Settings Generator / Manager with GUI Build on Spatie Laravel Settings');
            $install = $this->ask('🍅 Install Tomato Settings? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installSettings();
            }

            $this->info('🍅 Tomato Notifications');
            $this->info('Laravel Notifications Channel with GUI to send notifications with templates');
            $install = $this->ask('🍅 Install Tomato Notifications? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installNotifications();
            }

            $this->info('🍅 Tomato Backup');
            $this->info('Backup module for VILT Stack build with spatie laravel-backup');
            $install = $this->ask('🍅 Install Tomato Backup? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installBackup();
            }

            $this->info('🍅 Tomato Logs');
            $this->info('Log Viewer for VILT Stack using Laravel Log Reader');
            $install = $this->ask('🍅 Install Tomato Logs? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installLog();
            }

            $this->info('🍅 Tomato API');
            $this->info('Full API CRUD Generator build on repository pattern');
            $install = $this->ask('🍅 Install Tomato API? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installAPI();
            }

            $this->info('🍅 Tomato Locations');
            $this->info('Database seeds for Locations Module for Tomato Framework');
            $install = $this->ask('🍅 Install Tomato Locations? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installLocations();
            }

            $this->info('🍅 Tomato Subscription');
            $this->info('Plan subscription with selected features to build a feature control plan for Tomato');
            $install = $this->ask('🍅 Install Tomato Subscription? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installSubscription();
            }

            $this->info('🍅 Tomato Translations');
            $this->info('Database Base Translations Keys with Google Translations API Integration');
            $install = $this->ask('🍅 Install Tomato Translations? [yes/no]', 'yes');
            if($install === 'y' || $install === 'yes' || $install === null){
                $this->installTranslations();
            }

            $this->info('🍅 Thanks for using our framework place a star on github');
            $this->info('see: https://github.com/TomatoPHP/tomato-admin');
            $this->info('docs: https://TomatoPHP.gitbook.io/tomato-admin/');
        }
    }

    /**
     * @return void
     */
    public function installRoles(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-roles');
        $this->artisanCommand(['tomato-roles:install']);
        $this->info('add [use HasRoles;] to your User model');
        $this->info('email: admin@admin.com');
        $this->info('password: QTS@2022');
        $this->info('🍅 Tomato Roles installed successfully.');
    }

    /**
     * @return void
     */
    public function installComponents(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-components');
        $this->artisanCommand(['tomato-components:install']);
        $this->info('🍅 Tomato Components installed successfully.');
    }
    /**
     * @return void
     */
    public function installSettings(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-settings');
        $this->artisanCommand(['tomato-settings:install']);
        $this->info('🍅 Tomato Settings installed successfully.');
    }
    /**
     * @return void
     */
    public function installNotifications(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-notifications');
        $this->artisanCommand(['tomato-notifications:install']);
        $this->info('add [use InteractWithNotifications;] to your User model');
        $this->info('up queue by use [php artisan queue:work]');
        $this->info('🍅 Tomato Notifications installed successfully.');
    }
    /**
     * @return void
     */
    public function installBackup(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-backup');
        $this->artisanCommand(['tomato-backup:install']);
        $this->info('🍅 Tomato Backup installed successfully.');
    }
    /**
     * @return void
     */
    public function installLog(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-logs');
        $this->artisanCommand(['tomato-logs:install']);
        $this->info('🍅 Tomato Logs installed successfully.');
    }
    /**
     * @return void
     */
    public function installAPI(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-api');
        $this->artisanCommand(['tomato-api:install']);
        $this->info('🍅 Tomato API installed successfully.');
    }
    /**
     * @return void
     */
    public function installForms(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-forms');
        $this->artisanCommand(['tomato-forms:install']);
        $this->info('🍅 Tomato Forms installed successfully.');
    }
    /**
     * @return void
     */
    public function installLocations(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-locations');
        $this->artisanCommand(['tomato-locations:install']);
        $this->info('🍅 Tomato Locations installed successfully.');
    }
    /**
     * @return void
     */
    public function installSubscription(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-subscription');
        $this->artisanCommand(['tomato-subscription:install']);
        $this->info('🍅 Tomato Subscription installed successfully.');
    }
    /**
     * @return void
     */
    public function installTranslations(): void
    {
        $this->requireComposerPackages('tomatophp/tomato-translations');
        $this->artisanCommand(['tomato-translations:install']);
        $this->info('🍅 Tomato Translations installed successfully.');
    }
}
