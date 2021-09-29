<?php

namespace Miladimos\Toolkit\Console\Commands;

use Exception;
use Illuminate\Support\Str;
use Miladimos\Toolkit\Toolkit;
use Illuminate\Console\Command;
use Miladimos\Toolkit\Traits\ValidateFiles;
use Miladimos\Toolkit\Traits\HelpersMethods;

class MakeHelperCommand extends Command
{
    use ValidateFiles,
        HelpersMethods;


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

                if ((new self)->ensureHelperDoesntAlreadytExist($this->fileName)) {
                    $msg = (new self)->getHelperFilePath($this->fileName) . " already exist. you must overwrite it! Are you ok?";

                    $confirm = $this->confirm($msg);
                    if ($confirm) {
                        if (Toolkit::makeEmptyHelper($this->fileName)) {
                            $this->info("$this->fileName.php overwrite finished");
                            die;
                        } else {
                            $this->error('Error in overwriting helper!');
                            die;
                        }
                    } else {
                        $this->fileName = $this->ask("Enter the helper file name? ");
                    }
                }

                if (Toolkit::makeEmptyHelper($this->fileName)) {
                    $this->info("Empty helper File: {$this->fileName} is created successfully.");
                    die;
                } else {
                    $this->error('Error in creating helper!');
                    die;
                }
            }

            if ((new self)->ensureHelperDoesntAlreadytExist($this->fileName)) {
                $msg = (new self)->getHelperFilePath($this->fileName) . " already exist. you must overwrite it! Are you ok?";

                $confirm = $this->confirm($msg);
                if ($confirm) {
                    if (Toolkit::makeHelper($this->fileName)) {
                        $this->info("$this->fileName.php overwrite finished");
                        die;
                    } else {
                        $this->error('Error in overwriting helper!');
                        die;
                    }
                } else {
                    $this->fileName = $this->ask("Enter the helper file name? ");
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
    }
}
