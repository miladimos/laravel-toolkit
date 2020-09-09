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
        $this->registerPublishes();
    }

    protected function registerPublishes() {
        if($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('helpers.php'),
            ], 'helpers-config');


            $helperFile = config('helpers.file');
            $this->publishes([
//                __DIR__ . '/Helpers/helpers.php' => app_path("Helpers/helpers.php"),
                __DIR__ . '/Helpers/helpers.php' => app_path("Helpers/$helperFile.php"),
            ], 'helpers-file');

        }
    }

//    public function registerHelpers()
//    {
//        // Load the helpers in app/Http/helpers.php
//        if (file_exists($file = app_path('Http/helpers.php')))
//        {
//            require $file;
//        }
//    }
}
