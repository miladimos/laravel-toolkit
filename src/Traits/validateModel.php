<?php

namespace Miladimos\Toolkit\Traits;

use InvalidArgumentException;

trait ValidateModel
{

    protected function ensureHelperDoesntAlreadytExist($model)
    {
        if (class_exists($classFullyQualified = $this->getHelperDefaultNamespace($model), false)) {
            throw new InvalidArgumentException("{$classFullyQualified} already exists.");
        }
    }
}
