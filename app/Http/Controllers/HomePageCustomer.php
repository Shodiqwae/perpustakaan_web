<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon; // Import class Carbon untuk manajemen tanggal

class HomePageCustomer extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('HomePageCustomer.HomePageC', compact('books'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'book_id' => 'required|exists:books,id',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Buat peminjaman baru
        $loan = new Loan();
        $loan->user_id = auth()->user()->id; // Ambil ID user yang sedang login
        $loan->book_id = $request->book_id;
        $loan->borrow_date = now(); // Atur tanggal peminjaman
        $loan->return_date = Carbon::now()->addDays(7); // Atur tanggal pengembalian 7 hari dari sekarang
        $loan->status = 'pending'; // Atur status peminjaman sebagai pending
        $loan->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Peminjaman berhasil dilakukan. Tanggal pengembalian adalah ' . $loan->return_date->toDateString());
    }
}
