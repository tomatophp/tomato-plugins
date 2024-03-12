<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function Laravel\Prompts\info;
use function Laravel\Prompts\warning;

abstract class TomatoPackage
{
    use RunCommand;

    private ?string $label = null;
    private ?string $package = null;
    private ?string $module = null;
    private ?string $command = null;
    private ?string $description = null;

    public function install(string $pluginSystem): void
    {
        if($pluginSystem === 'modules'){
            if($this->module){
                info('🍅 Install '.$this->label.' plugin.');
                if($this->description){
                    warning($this->description);
                }

                $this->requireComposerPackages($this->module);
                $this->artisanCommand([$this->command]);
                $this->custom();
                info('🍅 '.$this->label.' installed successfully.');
            }
        }
        else {
            info('🍅 Install '.$this->label.' plugin.');
            if($this->description){
                warning($this->description);
            }
            $this->requireComposerPackages($this->package);
            $this->artisanCommand([$this->command]);
            $this->custom();
            info('🍅 '.$this->label.' installed successfully.');
        }

    }

    public function custom():void
    {
        //Custom Code Here
    }

    public function label(string $label){
        $this->label = $label;
    }

    public function package(string $package){
        $this->package = $package;
    }

    public function module(string $module){
        $this->module = $module;
    }

    public function command(string $command){
        $this->command = $command;
    }

    public function description(string $description){
        $this->description = $description;
    }

    public function getLabel():string
    {
        return $this->label;
    }
}
