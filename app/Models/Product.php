<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $name = 'product';

    protected $columns = [
        'name'
    ];

    protected $rules = [
        'name' => 'required|max:255'
    ];

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
        return trans("resources.{$this->name}.{$column}");
    }
}
