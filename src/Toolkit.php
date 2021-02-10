<?php

namespace Miladimos\Toolkit;

use Illuminate\Support\Facades\File;
use Miladimos\Toolkit\Traits\GetStubs;
use Miladimos\Toolkit\Traits\HelpersMethods;

class Toolkit
{
    use GetStubs,
        HelpersMethods;

    public static function makeHelper($name)
    {

        if (!File::isDirectory($path = (new self)->getHelperDirectory()))
            mkdir($path, 0777, true);

        $template = (new self)->getHelperStub();

        file_put_contents((new self)->getHelperFilePath($name), $template);

        return true;
    }

    public static function makeEmptyHelper($name)
    {
        if (!File::isDirectory($path = (new self)->getHelperDirectory()))
            mkdir($path, 0777, true);


        $template = (new self)->getEmptyHelperStub();

        file_put_contents((new self)->getHelperFilePath($name), $template);

        return true;
    }
}
