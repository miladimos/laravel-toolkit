<?php

namespace Miladimos\Toolkit\Traits;

trait ValidateFiles
{

    protected function ensureHelperDoesntAlreadyExist($file)
    {
        if (!file_exists($this->getHelperFilePath($file))) {
            return false;
        }

        return true;
    }
}
