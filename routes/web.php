<?php

use \Illuminate\Support\Facades\Route;

if((bool)config('tomato-plugins.active_ui')) {
    Route::middleware(['web', 'splade', 'verified'])->name('admin.')->group(function () {
        Route::get('admin/plugins', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'index'])->name('plugins.index');
        if((bool)config('tomato-plugins.allow_generator')) {
            Route::get('admin/plugins/build', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'build'])->name('plugins.build');
            Route::get('admin/plugins/database', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'database'])->name('plugins.database');
            Route::post('admin/plugins/migrate', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'migrate'])->name('plugins.migrate');
            Route::post('admin/plugins/generate', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'generate'])->name('plugins.generate');
        }

        if((bool)config('tomato-plugins.allow_create')) {
            Route::get('admin/plugins/create', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'create'])->name('plugins.create');
            Route::post('admin/plugins/store', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'store'])->name('plugins.store');
        }
        Route::get('admin/plugins/api', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'api'])->name('plugins.api');
        if((bool)config('tomato-plugins.allow_upload')) {
            Route::get('admin/plugins/upload', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'upload'])->name('plugins.upload');
            Route::post('admin/plugins/upload', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'uploadeNew'])->name('plugins.upload.new');
        }
        if((bool)config('tomato-plugins.allow_destroy')) {
            Route::post('admin/plugins/remove', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'remove'])->name('plugins.remove');
        }
        if((bool)config('tomato-plugins.allow_toggle')) {
            Route::post('admin/plugins/update', [\TomatoPHP\TomatoPlugins\Http\Controllers\PluginsController::class, 'update'])->name('plugins.update');
        }
    });
    if((bool)config('tomato-plugins.allow_generator')) {
        Route::middleware(['web', 'auth', 'splade', 'verified'])->name('admin.')->group(function () {
            Route::get('admin/tables', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'index'])->name('tables.index');
            Route::get('admin/tables/api', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'api'])->name('tables.api');
            Route::get('admin/tables/create', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'create'])->name('tables.create');
            Route::post('admin/tables', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'store'])->name('tables.store');
            Route::get('admin/tables/{model}', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'show'])->name('tables.show');
            Route::get('admin/tables/{model}/edit', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'edit'])->name('tables.edit');
            Route::get('admin/tables/{model}/generate', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'generator'])->name('tables.generator');
            Route::post('admin/tables/{model}/generate', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'generate'])->name('tables.generate');
            Route::post('admin/tables/{model}', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'update'])->name('tables.update');
            Route::delete('admin/tables/{model}', [\TomatoPHP\TomatoPlugins\Http\Controllers\TableController::class, 'destroy'])->name('tables.destroy');
        });
    }
}


