<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeAController extends Controller
{
    public function HomeA()
    {
        $BooksCount = Book::count();
        $totalStock = Book::sum('stock'); // Calculate total stock
        $books = Book::all(); // Fetch all books

        return view('admin.homeA', compact('BooksCount', 'totalStock', 'books'));
    }
}
