<?php

namespace TomatoPHP\TomatoPlugins\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use ProtoneMedia\Splade\Facades\Toast;
use Symfony\Component\Process\Process;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoPlugins\Models\Plugin;

class PluginsController extends Controller
{

    public function index(Request $request){
        return view('tomato-plugins::plugins.index');
    }

    public function api(Request $request){
        return response()->json([
            "data" => Plugin::all()
        ]);
    }

    public function clear(Request $request){
        try {
            Plugin::all()->withoutCache();
        }catch (\Exception $e){}

        Toast::success(__("Plugins Has Been Reloaded Refresh After 5 min"))->autoDismiss(2);
        return back();
    }

    public function install(Request $request){
        $request->validate([
            "package" => "required"
        ]);

        $getOutput = "";
        exec("which composer", $getOutput);
        dd($getOutput);

        (new Process([
            "composer",
            "require",
            $request->get('package')
        ], base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                dd($output);
            });
        Toast::success(__("Plugin Install Start In Background"))->autoDismiss(2);
        return back();
    }

    public function remove(Request $request){
        $request->validate([
            "package" => "required"
        ]);

        Toast::success(__("Plugin Install Remove In Background"))->autoDismiss(2);
        return back();
    }

    public function update(Request $request){
        $request->validate([
            "package" => "required"
        ]);

        Toast::success(__("Plugin Install Update In Background"))->autoDismiss(2);
        return back();
    }
}
