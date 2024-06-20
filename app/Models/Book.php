<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = ['book_code', 'title', 'author', 'slug', 'image_book', 'description', 'stock']; // Tambahkan stock ke $fillable

    public static $rules = [
        'book_code' => 'required|string',
        'title' => 'required|string',
        'author' => 'required|string',
        'slug' => 'required|string',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0', // Aturan validasi untuk stock
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
