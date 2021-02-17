<?php

namespace App\Traits;

trait hasJWT
{
    public function getJWTIdentifier(): int
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
