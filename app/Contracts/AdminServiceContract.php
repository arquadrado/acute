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

    /**
     * Creates an instance of a given admin resource
     *
     * @param  string $resource
     * @return Model $resourceModel or null
     */
    public function instantiateResource($resource, $directory = null);

    /**
     * Gets the class of a given admin resource
     *
     * @param  string $resource
     * @return string $className or null
     */
    public function getResourceClass($resource, $directory = null);
}
