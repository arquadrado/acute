<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface CrudServiceContract
{
    /**
     * Create models
     *
     * @param  string $class - Name of the model's class
     * @return Illuminate\Database\Eloquent\Model $model - created models
     */
    public function create($class);

    /**
     * Read models
     *
     * @param  string $class - Name of the model's class
     * @return Illuminate\Database\Eloquent\Model $model - read models
     */
    public function read($class);

    /**
     * Update models
     *
     * @param  Illuminate\Database\Eloquent\Model $model - model
     * @param  array $attributes - Model's attributes to update
     * @return Illuminate\Database\Eloquent\Model $model - updated models
     */
    public function update(Model $model = null, $attributes);

    /**
     * Delete models
     *
     * @param  Illuminate\Database\Eloquent\Model $model - model
     * @return boolean - result of the operation
     */
    public function delete(Model $model);

    /**
     * Save model
     *
     * @param  Illuminate\Database\Eloquent\Model $model - model
     * @return Illuminate\Database\Eloquent\Model $model - saved models
     */
    public function save(Model $model = null);
}
