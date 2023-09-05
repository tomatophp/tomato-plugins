<?php

namespace TomatoPHP\TomatoPlugins\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Package extends Model
{
    use Sushi;

    protected $schema = [
        'name' => 'string',
        'description' => 'string',
        'full_name' => 'string',
        'homepage' => 'string',
        'version' => 'string',
        'time' => 'datetime'
    ];

    public function getRows()
    {
        $packages = \Composer\InstalledVersions::getAllRawData();
        $data = [];
        foreach($packages[0]['versions'] as $key=>$package){
            $data[] = [
                "name" => $key,
                "version" => $package['version'] ?? null,
                "type" => $package['type'] ?? null,
            ];
        }

        return $data;
    }

    protected  function sushiShouldCache()
    {
        return true;
    }

}
