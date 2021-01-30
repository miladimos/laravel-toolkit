<?php

namespace Miladimos\Toolkit;

use Miladimos\Toolkit\Traits\getStubs;
use Miladimos\Toolkit\Traits\validateModel;
use Miladimos\Toolkit\Traits\helpersMethods;

class Toolkit
{
    use getStubs,
        helpersMethods,
        validateModel;

    protected static function createHelperFile($name)
    {
        $helperNamespace = self::getModelNamespace($name);
        $template = str_replace(
            ['{{$modelName}}', '{{ $modelNamespace }}'],
            [$name, $modelNamespace],
            self::getHelperStub()
        );


        file_put_contents(base_path("/App/Helpers/{$name}Toolkit.php"), $template);
    }

    protected static function createEmptyHelperFile($name)
    {
        $helperNamespace = self::getModelNamespace($name);
        $template = str_replace(
            ['{{$modelName}}', '{{ $modelNamespace }}'],
            [$name, $modelNamespace],
            self::getEmptyHelperStub()
        );


        file_put_contents(base_path("/App/Helpers/{$name}Toolkit.php"), $template);
    }

    public static function makeHelper($modelName)
    {

        if (!file_exists($path = (new self)->getToolkitDefaultNamespace()))
            mkdir($path, 0777, true);

        // self::createProvider();
        self::createHelperFile($modelName);

        return true;
    }

    public static function makeEmptyHelper($modelName)
    {

        if (!file_exists($path = (new self)->getToolkitDefaultNamespace()))
            mkdir($path, 0777, true);

        // self::createProvider();
        self::createHelperFile($modelName);

        return true;
    }
}
