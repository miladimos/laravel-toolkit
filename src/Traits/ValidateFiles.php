<?php

namespace Miladimos\Toolkit\Traits;


trait ValidateFiles
{

    protected function ensureHelperDoesntAlreadytExist($file)
    {
        if (!file_exists($this->getHelperFilePath($file))) {
            return false;
        }

        return true;
    }
}
