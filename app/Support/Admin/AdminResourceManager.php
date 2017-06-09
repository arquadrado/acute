<?php

namespace App\Support\Admin;

use App\Contracts\AdminServiceContract;
use App\Support\Admin\AdminResourceViewResolver;

class AdminResourceManager implements AdminServiceContract
{
    protected $service;

    public function __construct(AdminServiceContract $service)
    {
        $this->service = $service;
        $this->viewResolver = new AdminResourceViewResolver;
    }

    public function resolveResource($path)
    {
        return $this->service->resolveResource($path);
    }

    public function resourceExists($resource)
    {
        return $this->service->resourceExists($resource);
    }

    public function instantiateResource($resource, $directory = null)
    {
        return $this->service->instantiateResource($resource);
    }

    public function getResourceClass($resource, $directory = null)
    {
        return $this->service->getResourceClass($resource, $directory);
    }

    public function resolveResourceView($resource, $action)
    {
        return $this->viewResolver->resolveView($resource, $action);
    }
}
