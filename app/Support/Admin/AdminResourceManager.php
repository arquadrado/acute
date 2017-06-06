<?php

namespace App\Support\Admin;

use App\Contracts\AdminServiceContract;

class AdminResourceManager implements AdminServiceContract
{
    public function __construct(AdminServiceContract $service)
    {
        $this->service = $service;
    }

    public function resolveResource($path)
    {
        return $this->service->resolveResource($path);
    }
}
