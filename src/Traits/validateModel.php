<?php

namespace Miladimos\Toolkit\Traits;

use InvalidArgumentException;

trait ValidateModel
{

    protected function ensureHelperDoesntAlreadytExist($file)
    {
        if (file_exists($this->getHelperPath($file), false)) {
            throw new InvalidArgumentException("{$file} already exists.");
        }
    }
}
