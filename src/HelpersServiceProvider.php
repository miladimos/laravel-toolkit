<?php

namespace Miladimos\Helpers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/config.php", 'helpers');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '../config/config.php' => config_path('helpers.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/Helpers/helpers.php' => app_path("Helpers/helpers.php"),
            ], 'helpers');
        }

    }

    //
//        if (file_exists(base_path('Helpers/helpers.php'))) {
//            require_once(base_path('Helpers/helpers.php'));
//        }

//    public function registerHelpers()
//    {
//        // Load the helpers in app/Http/helpers.php
//        if (file_exists($file = app_path('Http/helpers.php')))
//        {
//            require $file;
//        }
//    }
}
