<?php

namespace App\Models;

use App\Models\Traits\Mediable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    use Mediable;

    protected $resource = '';
    protected $designationField = 'title';

    protected $columns = [
        'title'
    ];

    protected $fillable = [
        'title'
    ];

    protected $rules = [
        'title' => 'required|max:255'
    ];

    protected $appends = [
        'columns',
        'is_mediable',
        'designation',
        'action_routes'
    ];

    protected $with = ['media'];

    protected $mediable = true;

    /**
     * Gets the class of a given admin resource
     *
     * @param  void
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Gets the class of a given admin resource
     *
     * @param  array
     * @return void
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Gets the rules the resource's validation
     *
     * @param  void
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Gets the label for a given column
     *
     * @param  string $column
     * @return string $label
     */
    public function getColumnLabel($column)
    {
        if ($this->resource === '') {
            return trans("resources.${str_singular(get_class())}.{$column}");
        }
        return trans("resources.{$this->resource}.{$column}");
    }

    public function isMediable()
    {
        return $this->mediable;
    }

    //mutators

    public function getColumnsAttribute()
    {
        return collect($this->columns)->reduce(function ($reduced, $column) {
            $reduced[$column] = $this->getColumnLabel($column);
            return $reduced;
        }, []);
    }

    public function getIsMediableAttribute()
    {
        return $this->mediable;
    }

    public function getDesignationAttribute()
    {
        $field = $this->designationField;
        return $this->$field;
    }

    public function getActionRoutesAttribute()
    {
        $resource = str_plural($this->resource);

        return [
            'show' => route("admin.{$resource}.show", ['id' => $this->id]),
            'update' => route("admin.{$resource}.edit", ['id' => $this->id]),
            'destroy' => route("admin.{$resource}.destroy", ['id' => $this->id]),
        ];
    }
}
