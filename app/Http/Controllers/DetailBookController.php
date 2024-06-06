<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use Carbon\Carbon;


class DetailBookController extends Controller
{
    public function DetailBook($id)
    {
        $book = Book::findOrFail($id);
        return view('HomePageCustomer.detailbook', compact('book'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'book_id' => 'required|exists:books,id',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        $existingLoan = Loan::where('book_id', $request->book_id)
                        ->where('user_id', auth()->user()->id)
                        ->whereIn('status', ['pending', 'dipinjam'])
                        ->first();

    if ($existingLoan) {
        return redirect()->back()->with('error', 'Anda sudah meminjam buku ini sebelumnya.');
    }

        // Buat peminjaman baru
        $loan = new Loan();
        $loan->user_id = auth()->user()->id; // Ambil ID user yang sedang login
        $loan->book_id = $request->book_id;
        $loan->borrow_date = now(); // Atur tanggal peminjaman
        $loan->status = 'pending'; // Atur status peminjaman sebagai pending
        $loan->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Peminjaman berhasil dilakukan.');
    }
}
