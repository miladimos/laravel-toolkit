<?php

namespace Miladimos\Toolkit\Console\Commands;


use Illuminate\Support\Str;
use Miladimos\Toolkit\Toolkit;
use Illuminate\Console\Command;

class MakeHelperCommand extends Command
{

    protected $signature = "make:helper
                           { name : helper file name }
                           { --e|empty? : create empty helper file }
                           ";

    protected $name = 'Helper';

    protected $description = 'Create a new helper file';

    public function handle()
    {
        $name = trim(Str::lower($this->argument('name')));

        dd($name);
        $this->warn("helper file {$name} is creating ...");

        try {
            if (Toolkit::makeHelper($name)) {
                $this->info("Helper File: {$name} is created successfully.");
            } else {
                $this->error('Error in Creating Helper!');
                die;
            }
        } catch (\Exception $exception) {
            $this->error($exception);
            die;
        }

        return 0;
    }
}
