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
        $this->mergeConfigFrom(__DIR__ . "/../config/toolkit.php", 'toolkit');
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

    protected function registerPublishes()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/toolkit.php' => config_path('toolkit.php'),
            ], 'toolkit-config');


            $helperFile = config('toolkit.file');
            $this->publishes([
                //                __DIR__ . '/Helpers/toolkit.php' => app_path("Helpers/toolkit.php"),
                __DIR__ . '/Helpers/toolkit.php' => app_path("Helpers/$helperFile.php"),
            ], 'toolkit-file');
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
