<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = ['book_code', 'title', 'author', 'slug', 'status'];

    protected $casts = [
        'status' => 'string',
    ];

    public static $rules = [
        'book_code' => 'required|string',
        'title' => 'required|string',
        'author' => 'required|string', // Tambahkan validasi agar author tidak null
        'slug' => 'required|string',
        'status' => 'required|string',
    ];
}

