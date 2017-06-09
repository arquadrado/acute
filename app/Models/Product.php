<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $resource = 'product';
    protected $designationField = 'name';

    protected $columns = [
        'name' => 'string',
    ];

    protected $fillable = [
        'name'
    ];

    protected $rules = [
        'name' => 'required|max:255'
    ];
}
