<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\sluggable;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    use sluggable;
    use SoftDeletes;


    protected $fillable = ['name', 'slug', 'updated_at', 'created_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $dates = ['deleted_at'];
}
