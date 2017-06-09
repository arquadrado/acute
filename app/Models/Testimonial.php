<?php

namespace App\Models;

use App\Models\BaseModel;

class Testimonial extends BaseModel
{
    protected $resource = 'testimonial';

    protected $columns = [
        'title' => 'string',
        'content' => 'text',
        'approved' => 'boolean'
    ];

    protected $fillable = [
        'title',
        'content',
        'approved'
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required'
    ];
}
