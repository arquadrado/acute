<?php

namespace App\Services;

use App\Contracts\AdminServiceContract;

class AdminService implements AdminServiceContract
{
    /**
     * Resolve the name of an admin resource
     *
     * @param  string $path
     * @return string
     */
    public function resolveResource($path)
    {
        //dd('I will resolve, I promise');

        $explodedPath = explode('/', $path);


        if ($explodedPath[0] !== 'admin' || !isset($explodedPath[1])) {
            return null;
        }

        return str_singular($explodedPath[1]);
    }

    public function resourceExists($resource, $directory = 'App\\Models\\')
    {
        $className = $directory . studly_case($resource);

        return class_exists($className);
    }
}
