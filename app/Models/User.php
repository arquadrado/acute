<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'patology','treatment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The mutated attributes that should be appended as regular attributes.
     *
     * @var array
     */
    protected $appends = [
        'display_type'
    ];

    //mutators
    public function getDisplayTypeAttribute()
    {
        switch ($this->type) {
            case 'patient':
                return 'Paciente';

            case 'other':
                return 'Familiar ou prestador de cuidados';
        }
    }
}
