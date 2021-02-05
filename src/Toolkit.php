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

    protected static function createHelperFile($name)
    {
        $helperNamespace = self::getnamespace($name);
        $template = str_replace(
            ['{{$name}}', '{{ $namespace }}'],
            [$name, $namespace],
            self::getHelperStub()
        );


        file_put_contents(base_path("/App/Helpers/{$name}Toolkit.php"), $template);
    }

    protected static function createEmptyHelperFile($name)
    {
        $helperNamespace = self::getnamespace($name);
        $template = str_replace(
            ['{{$name}}', '{{ $namespace }}'],
            [$name, $namespace],
            self::getEmptyHelperStub()
        );


        file_put_contents(base_path("/App/Helpers/{$name}Toolkit.php"), $template);
    }

    public static function makeHelper($name)
    {

        if (!file_exists($path = (new self)->getToolkitDefaultNamespace()))
            mkdir($path, 0777, true);

        // self::createProvider();
        self::createHelperFile($name);

        return true;
    }

    public static function makeEmptyHelper($name)
    {
        // File::put('path', 'content');

        if (!file_exists($path = (new self)->getToolkitDefaultNamespace()))
            mkdir($path, 0777, true);

        // self::createProvider();
        self::createHelperFile($name);

        return true;
    }
}
