<?php

namespace App\Contracts;

interface AdminServiceContract
{
    /**
     * Resolve the name of an admin resource
     *
     * @param  string $path
     * @return string
     */
    public function resolveResource($path);

    /**
     * Resolve the name of an admin resource
     *
     * @param  string $resource
     * @return bool
     */
    public function resourceExists($resource);
}
