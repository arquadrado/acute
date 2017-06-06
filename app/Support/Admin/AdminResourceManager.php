<?php

namespace App\Support\Admin;

use App\Contracts\AdminServiceContract;

class AdminResourceManager implements AdminServiceContract
{
    protected $service;

    public function __construct(AdminServiceContract $service)
    {
        $this->service = $service;
    }

    public function resolveResource($path)
    {
        return $this->service->resolveResource($path);
    }

    public function resourceExists($resource)
    {
        return $this->service->resourceExists($resource);
    }

    public function getResourceClass($resource, $directory = null)
    {
        return $this->service->getResourceClass($resource, $directory);
    }
}
