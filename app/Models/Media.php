<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $name = 'media';

    protected $columns = [];

    protected $fillable = [
        'path',
        'mime_type'
    ];

    protected $rules = [];

    protected $appends = [];

    public function mediable()
    {
        return $this->morphTo();
    }
}
