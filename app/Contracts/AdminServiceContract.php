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
}
