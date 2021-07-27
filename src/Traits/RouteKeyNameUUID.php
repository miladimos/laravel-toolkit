<?php

namespace Miladimos\Toolkit\Traits;

trait RouteKeyNameUUID
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
