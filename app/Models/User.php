<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role', 'gambar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getGambarAttribute($value)
    {
        return $value ?? 'prf.png';
    }

}
