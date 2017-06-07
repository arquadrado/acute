<?php

namespace App\Services;

use App\Contracts\CrudServiceContract;
use Illuminate\Database\Eloquent\Model;

class CrudService implements CrudServiceContract
{
    protected $defaultResourceDirectory = 'App\\Models\\';
    protected $model = null;

    public function create($class)
    {
        if (is_null($class)) {
            return null;
        }
        $this->model = new $class;
        return $this;
    }

    public function read($class)
    {
        //
    }

    public function update(Model $model = null, $attributes = [])
    {
        $model = is_null($model) ? $this->model : $model;

        foreach ($attributes as $label => $value) {
            $model->$label = $value;
        }
        $this->model = $model;

        return $this;
    }

    public function delete(Model $model)
    {
        //
    }

    public function save(Model $model = null)
    {
        $model = is_null($model) ? $this->model : $model;

        try {
            $model->save();
            $this->model = $model;
            return $this;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function get()
    {
        return $this->model;
    }
}
