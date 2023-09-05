<?php

namespace TomatoPHP\TomatoPlugins\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;
use Symfony\Component\Process\Process;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoPlugins\Models\Package;
use TomatoPHP\TomatoPlugins\Models\Plugin;

class PluginsController extends Controller
{

    public function index(Request $request){
        return view('tomato-plugins::plugins.index');
    }

    public function api(Request $request){
        if(Cache::has('plugins') && count(Cache::get('plugins'))){
            $data = Cache::get('plugins');
        }
        else {
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

            Cache::put('plugins', $data);
        }

        return response()->json([
            "data" => $data
        ]);
    }

    public function clear(Request $request){
        Cache::forget('plugins');

        Toast::success(__("Plugins Has Been Reloaded"))->autoDismiss(2);
        return back();
    }

    public function show(Request $request){
        $request->validate([
            "package" => "required"
        ]);

        $package = Http::get('https://repo.packagist.org/p2/'.$request->get('package').'.json')->json();
        $package = $package['packages'][$request->get('package')][0];
        $data = [
            'name' => Str::of($package['name'])->replace('tomatophp/', '')->replace('-', ' ')->title(),
            'description' => $package['description'],
            'keywords' => $package['keywords'],
            'full_name' => $package['name'],
            'licenses' => isset($package['license']) && count($package['license'])?$package['license'] : [],
            'authors' => isset($package['authors']) && count($package['authors']) ?$package['authors'] : [],
            'homepage' => $package['homepage'],
            'version' => $package['version'],
            'installed' => Package::where('name', $package['name'])->first() ? true : false,
            'outdate' => Package::where('version','LIKE', $package['version'])->first() ? true : false,
            'time' => Carbon::parse($package['time']),
        ];

        return view('tomato-plugins::plugins.show', [
            "data" => $data
        ]);
    }

//    public function install(Request $request){
//        $request->validate([
//            "package" => "required"
//        ]);
//
//
//        Toast::success(__("Plugin Install Start In Background"))->autoDismiss(2);
//        return back();
//    }
//
//    public function remove(Request $request){
//        $request->validate([
//            "package" => "required"
//        ]);
//
//        Toast::success(__("Plugin Install Remove In Background"))->autoDismiss(2);
//        return back();
//    }
//
//    public function update(Request $request){
//        $request->validate([
//            "package" => "required"
//        ]);
//
//        Toast::success(__("Plugin Install Update In Background"))->autoDismiss(2);
//        return back();
//    }
}
