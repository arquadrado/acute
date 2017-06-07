<?php

namespace App\Services;

use App\Contracts\CrudServiceContract;
use Illuminate\Database\Eloquent\Model;

class CrudService implements CrudServiceContract
{
    protected $defaultResourceDirectory = 'App\\Models\\';
    //protected $model = null;

    public function create($class)
    {
        if (is_null($class)) {
            return null;
        }
        //$this->model = new $class;
        //return $this;
        return new $class;
    }

    public function read($class)
    {
        //
    }

    public function update(Model $model, $attributes = [])
    {
        //$model = is_null($model) ? $this->model : $model;

        foreach ($attributes as $label => $value) {
            $model->$label = $value;
        }
        //$this->model = $model;
        return $model;
    }

    public function delete(Model $model)
    {
        //
    }

    public function save(Model $model)
    {
        try {
            $model->save();
            return $model;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function get()
    {
        return $this->model;
    }
}
