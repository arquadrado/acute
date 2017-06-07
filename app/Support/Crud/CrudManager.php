<?php

namespace App\Support\Crud;

use App\Contracts\CrudServiceContract;
use Illuminate\Database\Eloquent\Model;

class CrudManager implements CrudServiceContract
{
    protected $service;

    public function __construct(CrudServiceContract $service)
    {
        $this->service = $service;
    }

    public function create($class)
    {
        return $this->service->create($class);
    }

    public function read($class)
    {
        return $this->service->read($class);
    }

    public function update(Model $model, $attributes = [])
    {
        return $this->service->update($model, $attributes);
    }

    public function delete(Model $model)
    {
        return $this->service->delete($class);
    }

    public function save(Model $model)
    {
        return $this->service->save($model);
    }
}
