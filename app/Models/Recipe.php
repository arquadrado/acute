<?php

namespace App\Models;

use App\Models\BaseModel;

class Recipe extends BaseModel
{
    protected $resource = 'recipe';

    protected $columns = [
        'title' => 'string',
        'description' => 'text',
        'approved' => 'boolean'
    ];

    protected $fillable = [
        'title',
        'description',
        'approved'
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'required'
    ];
}
