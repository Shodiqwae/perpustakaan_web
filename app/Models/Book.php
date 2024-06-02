<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $fillable = ['book_code', 'title', 'author', 'slug','image_book'];

    public static $rules = [
        'book_code' => 'required|string',
        'title' => 'required|string',
        'author' => 'required|string', // Tambahkan validasi agar author tidak null
        'slug' => 'required|string',
    ];

    /**
     * The categories that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

}

