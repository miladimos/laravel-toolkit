<?php

namespace Miladimos\Toolkit\Traits;

trait HasJWT
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
