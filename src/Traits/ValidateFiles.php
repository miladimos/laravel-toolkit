<?php

namespace Miladimos\Toolkit\Traits;


trait validateFiles
{

    protected function ensureHelperDoesntAlreadytExist($file)
    {
        if (!file_exists($this->getHelperFilePath($file))) {
            return false;
        }

        return true;
    }
}
