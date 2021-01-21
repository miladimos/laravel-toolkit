<?php


namespace Miladimos\Toolkit;


use Miladimos\Toolkit\Traits\getStubs;
use Miladimos\Toolkit\Traits\validateModel;
use Miladimos\Toolkit\Traits\helpersMethods;

class Toolkit
{
    use getStubs, helpersMethods, validateModel;


    protected static function createProvider()
    {
        $template =  self::getToolkitServiceProviderStub();

        if (!file_exists($path=base_path('/App/Providers/ToolkitServiceProvider.php')))
            file_put_contents(base_path('/App/Providers/ToolkitServiceProvider.php'), $template);
    }


    protected static function createToolkit($name)
    {
        $modelNamespace = self::getModelNamespace($name);
        $interfaceNamespace = self::getInterfaceNamespace($name);
        $template = str_replace(
            ['{{$modelName}}', '{{ $modelNamespace }}'],
            [$name, $modelNamespace],
            self::getToolkitStub()
        );


        file_put_contents(base_path("/App/Repositories/{$name}Toolkit.php"), $template);
    }

    protected static function createInterface($name)
    {
        $interfaceNamespace = self::getInterfaceNamespace($name);
        $template = str_replace(
            ['{{ $interfaceNamespace }}'],
            [$$interfaceNamespace],
            self::getToolkitInterfaceStub()
        );

        file_put_contents(base_path("/Repositories/{$name}EloquentToolkitInterface.php"), $template);

    }

    public static function make($modelName)
    {

        if (!file_exists($path=(new self)->getToolkitDefaultNamespace()))
            mkdir($path, 0777, true);

        // self::createProvider();
        self::createToolkit($modelName);
        self::createInterface($modelName);

        return true;
    }
}
