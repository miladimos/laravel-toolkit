<?php

namespace Miladimos\Toolkit\Traits;

use Illuminate\Support\Str;

trait helpersMethods
{

    protected function getHelperDefaultPath()
    {
        $helperNamespace = config('toolkit.helper.namespace') ?? 'Helpers';
        return app_path($helperNamespace);
    }

    protected static function getHelperNamespace($name)
    {
        $appNamespace = config('toolkit.helper.base_app_namespace') ?? 'App';
        $helperNamespace = config('toolkit.helper.helpers_namespace') ?? 'Helpers';

        return $appNamespace . '\\' . $helperNamespace . '\\' . $name . ';';
    }

    protected static function getHelperFileName($file)
    {
        return Str::lower($file);
    }
}
