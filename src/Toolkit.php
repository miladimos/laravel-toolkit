<?php

namespace Miladimos\Toolkit;

use Illuminate\Support\Facades\File;
use Miladimos\Toolkit\Traits\GetStubs;
use Miladimos\Toolkit\Traits\ValidateModel;
use Miladimos\Toolkit\Traits\HelpersMethods;

class Toolkit
{
    use GetStubs,
        HelpersMethods,
        ValidateModel;

    public static function makeHelper($name)
    {

        if (!file_exists($path = app_path((new self)->getHelperNamespace())))
            mkdir($path, 0777, true);

        $template = str_replace(
            ['{{$name}}', '{{ $namespace }}'],
            [$name, $namespace],
            self::getEmptyHelperStub()
        );

        return true;
    }

    public static function makeEmptyHelper($name)
    {
        if (!File::isDirectory($path = (new self)->getHelperDirectory()))
            mkdir($path, 0777, true);

        $helperNamespace = (new self)->getHelperNamespace();

        $template = (new self)->getEmptyHelperStub();

        file_put_contents((new self)->getHelperFilePath($name), $template);

        return true;
    }
}
