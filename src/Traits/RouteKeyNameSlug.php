<?php

namespace Miladimos\Toolkit\Traits;

trait RouteKeyNameSlug
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
