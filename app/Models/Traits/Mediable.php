<?php

namespace App\Models\Traits;

trait Mediable
{
    public function media()
    {
        return $this->morphMany('App\Models\Media', 'mediable');
    }
}
