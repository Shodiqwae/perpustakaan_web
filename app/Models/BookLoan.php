<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'status', 'loan_date', 'return_date'
    ];

    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hubungan dengan model Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
