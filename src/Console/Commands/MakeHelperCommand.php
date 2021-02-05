<?php

namespace Miladimos\Toolkit\Console\Commands;


use Exception;
use Illuminate\Support\Str;
use Miladimos\Toolkit\Toolkit;
use Illuminate\Console\Command;

class MakeHelperCommand extends Command
{

    protected $defaultFileName;

    public function __construct()
    {
        parent::__construct();
        $this->defaultFileName = config('toolkit.helpers.default_file_name');
    }

    protected $signature = "make:helper
                           { name? : helper file name }
                           { --e|empty : Create empty helper file }
                           ";

    protected $name = 'Helper';

    protected $description = 'Create a new helper file';


    protected $fileName;

    public function handle()
    {
        $this->fileName = trim(Str::lower($this->argument('name')));

        if (!$this->argument('name')) {
            $this->fileName = config('toolkit.helpers.default_file_name');
        }

        $this->warn("helper file {$this->fileName} is creating ...");

        try {

            if ($this->option('empty')) {

                if (Toolkit::makeEmptyHelper($this->fileName)) {
                    $this->info("Empty helper File: {$this->fileName} is created successfully.");
                    die;
                } else {
                    $this->error('Error in creating helper!');
                    die;
                }
            }

            if (Toolkit::makeHelper($this->fileName)) {
                $this->info("Full Helper file: {$this->fileName} is created successfully.");
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
