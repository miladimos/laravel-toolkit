<?php

namespace Miladimos\Toolkit\Console\Commands;


use Illuminate\Support\Str;
use Miladimos\Toolkit\Toolkit;
use Illuminate\Console\Command;

class MakeHelperCommand extends Command
{

    protected $signature = "make:helper
                           { name : helper file name }";

    protected $name = 'Helper';

    protected $description = 'Make New helper file';

    public function handle()
    {
        $name = trim(Str::lower($this->argument('name')));

        $this->warn("helper file {$name} is creating ...");

        try {
            if (Toolkit::makeHelper($name))
                $this->info("Helper File: {$name} is created successfully.");
            else
                $this->error('Error in Creating Helper!');
            die;
        } catch (\Exception $exception) {
            $this->error($exception);
            die;
        }

        return 0;
    }
}
