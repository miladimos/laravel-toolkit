<?php

namespace Miladimos\Toolkit\Console\Commands;


use Illuminate\Support\Str;
use Illuminate\Console\Command;

class MakeHelperCommand extends Command
{

    protected $signature = "make:helper
                           { model : Model Name }";

    protected $name = 'Helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make New helper file';


    public function handle()
    {
        $modelName = trim(Str::studly($this->argument('name')));

        $this->warn("helper file {$modelName} is creating ...");

        try {
            if (Repository::make($modelName))
                $this->info("Repository Model: {$modelName} is created successfully.");
            else
                $this->error('Error in Creating Repository!');
            die;
        } catch (\Exception $exception) {
            $this->error($exception);
            die;
        }

        return 0;
    }
}
