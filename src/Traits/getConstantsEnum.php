<?php

namespace App\Traits;

use ReflectionClass;

trait getConstantsEnum
{
    public static function getConstants()
    {
        $reflectionClass = new ReflectionClass(static::class); // __CLASS__
        return $reflectionClass->getConstants();
    }
}
