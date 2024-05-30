<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomePageCustomer extends Controller
{
    public function HomePageCustomer(){
        $books = Book::all();
        return view('HomePageCustomer.HomePageC', ['books' => $books]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Buat peminjaman buku
        BookLoan::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'status' => 'pending',
            'loan_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Peminjaman buku berhasil dibuat!');
    }
}
