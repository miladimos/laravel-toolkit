<?php

namespace Miladimos\Toolkit\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageCommand extends Command
{

    protected $signature = "toolkit:install";

    protected $name = 'Install Toolkit Package';

    protected $description = 'Simply Install laravel-toolkit Package';


    public function handle()
    {
        $this->info("Toolkit Package installing started...");

        // config file
        if (File::exists(config_path('toolkit.php'))) {
            $confirmConfig = $this->confirm("toolkit.php already exist. you must overwrite it! Are you ok?");
            if ($confirmConfig) {
                $this->publishConfig();
                $this->info("config publish/overwrite finished");
            } else {
                $this->error("you must publish and overwrite config file");
                die;
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }

        $confirmStub = $this->confirm("Do you like publish stubs files?");
        if ($confirmStub) {
            if (File::isDirectory(resource_path('vendor/miladimos/toolkit/stubs'))) {
                $confirmConfig = $this->confirm("stubs files already exist. you must overwrite it! Are you ok?");
                if ($confirmConfig) {
                    $this->publishStubs();
                    $this->info("stubs publish/overwrite finished");
                    die;
                } else {
                    $this->error("you must publish and overwrite stubs file");
                    die;
                }
            }
            $this->publishStubs();
            $this->info("stub files published!");
        } else {
            $this->error("you must publish and overwrite stubs file");
            die;
        }

        $this->info("toolkit package installed successfully! please star me on github!");

        return 0;
    }


    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Miladimos\Toolkit\Providers\ToolkitServiceProvider",
            '--tag' => "toolkit-config",
            '--force' => true
        ]);
    }

    private function publishStubs()
    {

        $this->call('vendor:publish', [
            '--provider' => "Miladimos\Toolkit\Providers\ToolkitServiceProvider",
            '--tag' => "toolkit-stubs",
            '--force' => true
        ]);
    }
}
