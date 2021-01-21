<?php

namespace Miladimos\Toolkit\Facades;

use Illuminate\Support\Facades\Facade;

class ToolkitFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'toolkit';
    }
}
