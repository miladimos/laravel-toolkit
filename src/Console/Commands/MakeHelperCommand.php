<?php

namespace Miladimos\Toolkit\Console\Commands;


use Exception;
use Illuminate\Support\Str;
use Miladimos\Toolkit\Toolkit;
use Illuminate\Console\Command;

class MakeHelperCommand extends Command
{

    protected $signature = "make:helper
                           { name=helpers : helper file name }
                           { --e|empty : Create empty helper file }
                           ";

    protected $name = 'Helper';

    protected $description = 'Create a new helper file';

    public function handle()
    {
        $name = trim(Str::lower($this->argument('name')));

        $this->warn("helper file {$name} is creating ...");

        try {

            if ($this->option('empty')) {

                if (Toolkit::makeEmptyHelper($name)) {
                    $this->info("Empty helper File: {$name} is created successfully.");
                    die;
                } else {
                    $this->error('Error in creating helper!');
                    die;
                }
            }

            if (Toolkit::makeHelper($name)) {
                $this->info("Full Helper file: {$name} is created successfully.");
                die;
            } else {
                $this->error('Error in creating helper!');
                die;
            }
        } catch (Exception $exception) {
            $this->error($exception);
            die;
        }

        return 0;
    }
}
