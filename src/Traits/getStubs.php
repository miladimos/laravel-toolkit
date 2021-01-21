<?php

namespace Miladimos\Toolkit\Traits;


trait getStubs
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected static function getHelperStub()
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/helper.stub"));
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected static function getEmptyHelperStub()
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/emptyHelper.stub"));
    }


    protected static function getStub($type)
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/$type.stub"));
    }


    /**
     * Get path to the stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return __DIR__ . '/../Console/Stubs/';
    }
}
