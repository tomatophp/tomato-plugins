<?php

namespace TomatoPHP\TomatoPlugins\Console\Blueprints;

abstract class Blueprint
{

    private ?string $label = null;
    private array $packages = [];

    public function install(): void
    {
        foreach ($this->packages as $package){
            app($package)->install();
        }
        info('🍅 '.$this->label.' blueprint installed successfully.');
    }

    public function packages(array $packages): void
    {
        $this->packages = $packages;
    }

    public function label(string $label): void
    {
        $this->label = $label;
    }

    public function getLabel():string
    {
        return $this->label;
    }
}
