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
    private ?string $command = null;
    private ?string $description = null;

    public function install(): void
    {
        info('🍅 Install '.$this->label.' plugin.');
        if($this->description){
            warning($this->description);
        }
        $this->requireComposerPackages($this->package);
        $this->artisanCommand([$this->command]);
        $this->custom();
        info('🍅 '.$this->label.' installed successfully.');
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
