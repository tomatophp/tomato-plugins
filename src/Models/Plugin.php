<?php

namespace TomatoPHP\TomatoPlugins\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Plugin extends Model
{
    use Sushi;

    public bool $cashed = true;

    protected $schema = [
        'name' => 'string',
        'description' => 'string',
        'full_name' => 'string',
        'homepage' => 'string',
        'version' => 'string',
        'time' => 'datetime',
        'installed' => 'boolean',
        'outdate' => 'boolean',
    ];

    public function getRows()
    {
        $packages = Http::get('https://packagist.org/packages/list.json', [
            "vendor" => "tomatophp"
        ])->json();
        $data = [];
        foreach($packages['packageNames'] as $package){
            $name = $package;
            $package = Http::get('https://repo.packagist.org/p2/'.$package.'.json')->json();
            $package = $package['packages'][$name][0];
            $data[] = [
                'name' => Str::of($package['name'])->replace('tomatophp/', '')->replace('-', ' ')->title(),
                'full_name' => $package['name'],
                'description' => $package['description'],
                'homepage' => $package['homepage'],
                'version' => $package['version'],
                'installed' => Package::where('name', $package['name'])->first() ? true : false,
                'outdate' => Package::where('version','LIKE', $package['version'])->first() ? true : false,
                'time' => Carbon::parse($package['time']),
            ];
        }

        return $data;
    }

    public function withoutCache(){
        $this->cashed = false;
        return $this;
    }

    protected function sushiShouldCache()
    {
        return $this->cashed;
    }

}
