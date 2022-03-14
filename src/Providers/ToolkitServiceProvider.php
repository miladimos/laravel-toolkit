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
        $this->mergeConfigFrom(__DIR__ . "/../../config/toolkit.php", 'toolkit');

        $this->registerFacades();
    }


    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->registerCommands();
            $this->publishStubs();
        }
    }

    private function registerFacades()
    {
        $this->app->bind('toolkit', function ($app) {
            return new Toolkit();
        });
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/toolkit.php' => config_path('toolkit.php')
        ], 'toolkit-config');
    }


    public function registerCommands()
    {
        $this->commands([
            InstallPackageCommand::class,
            MakeHelperCommand::class,
        ]);
    }

    public function publishStubs()
    {
        $this->publishes([
            __DIR__ . '/../Console/Stubs' => resource_path('vendor/miladimos/toolkit/stubs'),
        ], 'toolkit-stubs');
    }
}
