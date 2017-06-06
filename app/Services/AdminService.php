<?php

namespace App\Services;

use App\Contracts\AdminServiceContract;

class AdminService implements AdminServiceContract
{
    protected $defaultResourceDirectory = 'App\\Models\\';

    /**
     * Resolve the name of an admin resource
     *
     * @param  string $path
     * @return string
     */
    public function resolveResource($path)
    {
        $explodedPath = explode('/', $path);

        if ($explodedPath[0] !== 'admin' || !isset($explodedPath[1])) {
            return null;
        }

        return $explodedPath[1];
    }

    /**
     * Resolve the name of an admin resource
     *
     * @param  string $resource
     * @return string $className or bool false if class doesn't exist
     */
    public function resourceExists($resource, $directory = null)
    {
        if (is_null($directory)) {
            $directory = $this->defaultResourceDirectory;
        }

        $className = $directory . studly_case(str_singular($resource));

        return class_exists($className);
    }

    /**
     * Creates an instance of a given admin resource
     *
     * @param  string $resource
     * @return Model $resourceModel or null
     */
    public function instanciateResource($resource, $directory = null)
    {
        if (is_null($directory)) {
            $directory = $this->defaultResourceDirectory;
        }

        if ($this->resourceExists($resource, $directory)) {
            $className = $directory . studly_case(str_singular($resource));

            $resourceModel = new $className;

            return $resourceModel;
        }

        return null;
    }


    /**
     * Gets the class of a given admin resource
     *
     * @param  string $resource
     * @return string $className or null
     */
    public function getResourceClass($resource, $directory = null)
    {
        if (is_null($directory)) {
            $directory = $this->defaultResourceDirectory;
        }

        if ($this->resourceExists($resource, $directory)) {
            $className = $directory . studly_case(str_singular($resource));

            return $className;
        }

        return null;
    }
}
