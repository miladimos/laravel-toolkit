<?php

namespace Miladimos\Toolkit\Traits;

use Illuminate\Support\Str;

trait helpersMethods
{

    protected function getHelperDefaultNamespace()
    {
        $helperNamespace = config('toolkit.helper.namespace') ?? 'Helpers';
        return app_path($helperNamespace);
    }

    /**
     * Get the class name of the file name.
     *
     * @param string $file
     * @return string
     */
    protected static function getHelperFileName($file)
    {
        return Str::studly($file);
    }

    protected static function getHelperNamespace($model)
    {
        $appNamespace = config('toolkit.helper.base_app_namespace') ?? 'App';
        $modelNamespace = config('toolkit.helper.models_namespace') ?? 'Models';

        return $appNamespace . '\\' . $modelNamespace . '\\' . $model . ';';
    }
}
