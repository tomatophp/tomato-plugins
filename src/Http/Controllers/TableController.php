<?php

namespace TomatoPHP\TomatoPlugins\Http\Controllers;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Nwidart\Modules\Facades\Module;
use ProtoneMedia\Splade\Facades\Toast;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoPlugins\Models\Table;
use TomatoPHP\TomatoPlugins\Services\CRUDGenerator;
use TomatoPHP\TomatoPlugins\Services\PluginGenerator;

class TableController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoPlugins\Models\Table::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $request->validate([
            "module" => "required"
        ]);


        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }


        $query = Table::query();
        $query->where('module', $request->get('module'));

        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-plugins::tables.index',
            table: \TomatoPHP\TomatoPlugins\Tables\TableTable::class,
            query: $query
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        $request->validate([
            "module" => "required"
        ]);


        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }


        $query = Table::query();
        $query->where('module', $request->get('module'));

        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoPlugins\Models\Table::class,
            query: $query
        );
    }

    /**
     * @return View
     */
    public function create(Request $request): View
    {
        $request->validate([
            "module" => "required"
        ]);


        $module = Module::find($request->get('module'));
        if(!$module){
            Toast::error(__("Module Not Found"))->autoDismiss(2);
            return back();
        }


        return Tomato::create(
            view: 'tomato-plugins::tables.create',
            data: [
                "module" => $request->get('module')
            ]
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoPlugins\Models\Table::class,
            message: __('Table updated successfully'),
            redirect: 'admin.tables.index',
            validation: [
                "module" => "required",
                "name" => "required",
                "cols" => "required|array|min:1",
                "timestamps" => "nullable|boolean",
                "softDelete" => "nullable|boolean",
            ]
        );

        $response->record->tableCols()->createMany($request->get('cols'));

        if($response instanceof JsonResponse){
            return $response;
        }

        return redirect()->route('admin.tables.index', ['module' => $response->record->module]);
    }

    /**
     * @param \TomatoPHP\TomatoPlugins\Models\Table $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoPlugins\Models\Table $model): View|JsonResponse
    {
        $model->cols = $model->tableCols;
        return Tomato::get(
            model: $model,
            view: 'tomato-plugins::tables.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoPlugins\Models\Table $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoPlugins\Models\Table $model): View
    {
        $model->cols = $model->tableCols;

        return Tomato::get(
            model: $model,
            view: 'tomato-plugins::tables.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoPlugins\Models\Table $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoPlugins\Models\Table $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            message: __('Table updated successfully'),
            redirect: 'admin.tables.index',
        );


        $model->tableCols()->delete();
        $response->record->tableCols()->createMany($request->get('cols'));

         if($response instanceof JsonResponse){
             return $response;
         }

        return redirect()->route('admin.tables.index', ['module' => $model->module]);
    }

    /**
     * @param \TomatoPHP\TomatoPlugins\Models\Table $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoPlugins\Models\Table $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Table deleted successfully'),
            redirect: 'admin.tables.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return back();
    }


    public function generator(Table $model, Request $request)
    {
        return view('tomato-plugins::tables.generate', [
            "model" => $model
        ]);
    }

    public function generate(Table $model, Request $request)
    {
        $request->validate([
            "form_type" => "required"
        ]);

        if($request->get('form_type') === 'crud' && ! \Illuminate\Support\Facades\Schema::hasTable($model->name)){
              Toast::danger(__("Table Not Found"))->autoDismiss(2);
              return back();
        }
        else if($request->get('form_type') === 'migrations' && \Illuminate\Support\Facades\Schema::hasTable($model->name)){
            Toast::danger(__("Table Already Exists"))->autoDismiss(2);
            return back();
        }


        if($request->get('form_type') === 'migrate'){
            $model->migrated = true;
            $model->save();

            Artisan::call('migrate');

            Toast::success(__("Table Migrated Successfully"))->autoDismiss(2);
            return back();
        }

        $generator = new CRUDGenerator(
            table: $model,
            migration: $request->get('form_type') === 'migrations',
            models: $request->get('form_type') === 'models' || $request->get('form_type') === 'crud',
            request: $request->get('form_type') === 'form-request' || $request->get('form_type') === 'crud',
            tables: $request->get('form_type') === 'tables' || $request->get('form_type') === 'crud',
            routes: $request->get('form_type') === 'routes' || $request->get('form_type') === 'crud',
            apiRoutes: $request->get('form_type') === 'api-routes' || $request->get('form_type') === 'crud',
            controllers: $request->get('form_type') === 'controller' || $request->get('form_type') === 'crud',
            views: $request->get('form_type') === 'views' || $request->get('form_type') === 'crud',
            json: $request->get('form_type') === 'json-resource' || $request->get('form_type') === 'crud',
            menu: $request->get('form_type') === 'menu' || $request->get('form_type') === 'crud',
        );

        $generator->generate();




        Toast::success(__("Table Generated Successfully"))->autoDismiss(2);
        return back();
    }
}
