<?php

namespace Miladimos\Toolkit\Providers;

use Miladimos\Toolkit\Toolkit;
use Illuminate\Support\ServiceProvider;
use Miladimos\Toolkit\Console\Commands\InstallPackageCommand;
use Miladimos\Toolkit\Console\Commands\MakeHelperCommand;

class ToolkitServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/toolkit.php", 'toolkit');

        $this->registerFacades();
    }


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->registerCommands();
        }
    }

    private function registerFacades()
    {
        $this->app->bind('toolkit', function ($app) {
            return new Toolkit();
        });
    }

    private function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('toolkit.php')
        ], 'toolkit-config');
    }


    private function registerCommands()
    {
        $this->commands([
            InstallPackageCommand::class,
            MakeHelperCommand::class,
        ]);
    }

    // protected function registerPublishes()
    // {
    //     $helperFile = config('toolkit.file');
    //     $this->publishes([
    //         __DIR__ . '/Toolkit/toolkit.php' => app_path("Toolkit/$helperFile.php"),
    //     ], 'toolkit-file');
    // }

    //    public function registerToolkit()
    //    {
    //        // Load the helpers in app/Http/helpers.php
    //        if (file_exists($file = app_path('Http/helpers.php')))
    //        {
    //            require $file;
    //        }
    //    }
}
