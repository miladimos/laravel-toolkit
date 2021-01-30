<?php

namespace Miladimos\Toolkit\Traits;

trait getStubs
{
    protected static function getHelperStub()
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/helpers.stub"));
    }

    protected static function getEmptyHelperStub()
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/emptyHelper.stub"));
    }

    protected static function getStub($type)
    {
        return file_get_contents(resource_path("vendor/miladimos/toolkit/stubs/$type.stub"));
    }

    public function stubPath()
    {
        return __DIR__ . '/../Console/Stubs/';
    }
}
