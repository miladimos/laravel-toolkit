<?php

namespace Miladimos\Toolkit\Traits;

use Carbon\Carbon;

trait HasTimestamps
{
    public function createdAt($format = null): Carbon
    {
        return $format ? $this->created_at : Carbon::parse($this->created_at)->format($format);
    }

    public function updatedAt($format = null): Carbon
    {
        return $format ? $this->updated_at : Carbon::parse($this->updated_at)->format($format);
    }

    public function deletedAt($format = null): Carbon
    {
        return $format ? $this->deleted_at : Carbon::parse($this->deleted_at)->format($format);
    }


}
