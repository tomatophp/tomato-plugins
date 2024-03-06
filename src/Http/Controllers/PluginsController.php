<?php

namespace TomatoPHP\TomatoPlugins\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ProtoneMedia\Splade\Facades\Toast;
use Symfony\Component\Process\Process;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoPlugins\Models\Package;
use TomatoPHP\TomatoPlugins\Models\Plugin;
use TomatoPHP\TomatoPlugins\Services\CRUDGenerator;
use TomatoPHP\TomatoPlugins\Services\PluginGenerator;

class PluginsController extends Controller
{

    public function index(Request $request){
        return view('tomato-plugins::plugins.index', [
            "table" => (new \TomatoPHP\TomatoPlugins\Tables\PluginTable())
        ]);
    }

    public function create()
    {
        return view('tomato-plugins::plugins.create');
    }

    public function build(Request $request)
    {
        $request->validate([
            "module" => "required"
        ]);

        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }

        return view('tomato-plugins::plugins.build', [
            "module" => $module
        ]);
    }

    public function database(Request $request)
    {
        $request->validate([
            "module" => "required"
        ]);

        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }

        return view('tomato-plugins::plugins.database', [
            "module" => $module
        ]);
    }

    public function migrate(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "cols" => "required|array",
            "timestamps" => "required|boolean",
            "softDelete" => "required|boolean",
            "module" => "required"
        ]);

        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }

        $cols = $request->get('cols');
        if($request->has('timestamps') && $request->get('timestamps')){
            $cols[] = [
                "name" => "created_at",
                "type" => "datetime",
                "nullable" => true,
            ];
            $cols[] = [
                "name" => "updated_at",
                "type" => "datetime",
                "nullable" => true,
            ];
        }

        if($request->has('softDelete') && $request->get('softDelete')){
            $cols[] = [
                "name" => "deleted_at",
                "type" => "datetime",
                "nullable" => true,
            ];
        }

        $generator = new CRUDGenerator(
            tableName: Str::of($request->get('name'))->slug()->toString(),
            moduleName: $request->get('module'),
            fields: $cols,
            module: false,
            migration: true,
            controllers: false,
            request: false,
            models: false,
            views: false,
            tables: false,
            routes: false,
            apiRoutes: false,
            json: false,
        );
        $generator->generate();

        Toast::success(__("Migration Created Successfully"))->autoDismiss(2);
        return redirect()->route('admin.plugins.index');

    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "description" => "required|string|max:255",
            "color" => "required|string|max:255",
            "icon" => "required|string|max:255",
        ]);

        $checkIfPluginExists = Module::find(Str::of($request->get('name'))->camel()->ucfirst()->toString());
        if($checkIfPluginExists){
            Toast::error(__("Plugin Already Exists"))->autoDismiss(2);
            return back();
        }

        $generator = new PluginGenerator(
            $request->get('name'),
            $request->get('description'),
            $request->get('color'),
            $request->get('icon')
        );
        $generator->generate();

        Toast::success(__("Plugin Created Successfully"))->autoDismiss(2);
        return redirect()->route('admin.plugins.index');
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
                    'type' => $package['type'],
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

    public function update(Request $request)
    {
        $request->validate([
            "module" => "required"
        ]);

        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }

        $getModuleJson = json_decode(File::get($module->getPath().'/module.json'));
        if(isset($getModuleJson->required) && $module->isDisabled()){
            foreach($getModuleJson->required as $require){
                $checkIfRequiredExistsAndEnabled = Module::find($require);
                if($checkIfRequiredExistsAndEnabled){
                    if($checkIfRequiredExistsAndEnabled->isEnabled()){
                        continue;
                    }
                    else {
                        Toast::danger(__("Required Module Not Enabled [" .$require. "]"))->autoDismiss(2);
                        return back();
                    }
                }
                else {
                    Toast::danger(__("Required Module Not Found [" .$require. "]"))->autoDismiss(2);
                    return back();
                }
            }
        }

        $module->isEnabled() ? $module->disable() : $module->enable();

        Toast::success(__("Plugin Status Changed Successfully"))->autoDismiss(2);
        return back();
    }

    public function remove(Request $request)
    {
        $request->validate([
            "module" => "required"
        ]);

        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }

        $module->delete();

        Toast::success(__("Plugin Deleted Successfully"))->autoDismiss(2);
        return redirect()->route('admin.plugins.index');
    }

    public function install(Request $request){
        $request->validate([
            "package" => "required"
        ]);


        Toast::success(__("Plugin Install Start In Background"))->autoDismiss(2);
        return back();
    }

    public function upload()
    {
        return view('tomato-plugins::plugins.upload');
    }

    public function uploadeNew(Request $request)
    {
        $request->validate([
            "module" => "required|file|mimes:zip"
        ]);

        $zip = new \ZipArchive();
        $res = $zip->open($request->file('module'));

        if ($res === TRUE) {
            $zip->extractTo(base_path('Modules'));
            if(File::exists(base_path('Modules/__MACOSX'))){
                File::deleteDirectory(base_path('Modules/__MACOSX'));
            }

            $zip->close();

            Toast::success(__('Your Module Has Been Added Success'))->autoDismiss(2);
            return back();
        }

        Toast::danger(__('Sorry Your File Uploaded Is Not Correct'))->autoDismiss(2);
        return back();
    }
}
