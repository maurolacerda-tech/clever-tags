<?php

namespace Modules\Tags\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class TagServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace('Modules\Tags\Http\Controllers')
            ->middleware(['web'])
            ->group(__DIR__. '/../Routes/web.php');

            $this->loadViewsFrom(__DIR__.'/../Views', 'Tag');

            $this->loadMigrationsFrom(__DIR__.'/../Migrations');

            $this->publishes([
                __DIR__.'/../Views' => resource_path('views/vendor/Tag'),
            ], 'views');

            
            $this->publishes([
                __DIR__.'/../Config/tags.php' => config_path('tags.php'),
            ], 'config');
            
    }
    public function register()
    {        
        $this->mergeConfigFrom(
            __DIR__.'/../Config/tags.php',
            'tags'
        );
        
    }
}