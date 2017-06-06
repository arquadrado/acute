<?php

namespace App\Support\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class AdminResourceManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'AdminResourceManager';
    }
}
