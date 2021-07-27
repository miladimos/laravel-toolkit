<?php

namespace Miladimos\Toolkit\Traits;

use Illuminate\Support\Str;

trait HelpersMethods
{

    protected static function getHelperFilePath($file)
    {
        $helperNamespace = config('toolkit.helpers.namespace') ?? 'Helpers';

        return app_path($helperNamespace . DIRECTORY_SEPARATOR . $file . '.php');
    }


    protected static function getHelperNamespace($full = true)
    {
        $appNamespace = config('toolkit.base_app_namespace') ?? 'App';
        $helperNamespace = config('toolkit.helpers.namespace') ?? 'Helpers';

        if ($full)
            return $appNamespace . DIRECTORY_SEPARATOR . $helperNamespace . ';';


        return $appNamespace . DIRECTORY_SEPARATOR . $helperNamespace;
    }

    protected static function getHelperDirectory()
    {
        $helperNamespace = config('toolkit.helpers.namespace') ?? 'Helpers';

        return app_path($helperNamespace);
    }

    protected static function getHelperFileName($file)
    {
        return Str::lower($file);
    }
}
