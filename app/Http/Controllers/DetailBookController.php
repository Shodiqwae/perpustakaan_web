<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Rating;
use App\Models\Favorite;
use Carbon\Carbon;

class DetailBookController extends Controller
{
    public function DetailBook($id)
    {
        $book = Book::findOrFail($id);
        $userLoan = Loan::where('book_id', $id)
                        ->where('user_id', auth()->user()->id)
                        ->whereIn('status', ['pending', 'dipinjam'])
                        ->first();

        return view('HomePageCustomer.detailbook', compact('book', 'userLoan'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $user = auth()->user();
        $bookId = $request->book_id;

        // Cek apakah ada peminjaman sebelumnya yang statusnya selesai atau dikembalikan
        $existingLoan = Loan::where('book_id', $bookId)
                            ->where('user_id', $user->id)
                            ->whereIn('status', ['selesai', 'dikembalikan'])
                            ->first();

        if ($existingLoan) {
            // Jika ada, ubah status peminjaman tersebut menjadi 'pending'
            $existingLoan->status = 'pending';
            $existingLoan->borrow_date = now();
            $existingLoan->return_date = null; // Hapus tanggal pengembalian jika ada
            $existingLoan->save();

            // Kurangi stok buku
            $book = Book::findOrFail($bookId);
            $book->stock -= 1;
            $book->save();

            return redirect()->back()->with('success', 'Peminjaman berhasil dilakukan.');
        }

        // Jika tidak ada peminjaman sebelumnya, cek apakah sudah ada peminjaman yang masih aktif
        $activeLoan = Loan::where('book_id', $bookId)
                            ->where('user_id', $user->id)
                            ->whereIn('status', ['pending', 'dipinjam'])
                            ->first();

        if ($activeLoan) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini sebelumnya.');
        }

        // Dapatkan buku yang akan dipinjam
        $book = Book::findOrFail($bookId);

        // Periksa apakah stok mencukupi
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        // Kurangi stok buku
        $book->stock -= 1;
        $book->save();

        // Buat peminjaman baru
        $loan = new Loan();
        $loan->user_id = $user->id;
        $loan->book_id = $bookId;
        $loan->borrow_date = now();
        $loan->status = 'pending';
        $loan->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil dilakukan.');
    }

    public function addToFavorite(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Cek apakah buku sudah ditambahkan ke favorit sebelumnya
        $existingFavorite = Favorite::where('book_id', $request->book_id)
                                     ->where('user_id', auth()->user()->id)
                                     ->first();

        if ($existingFavorite) {
            return redirect()->back()->with('error', 'Buku sudah ditambahkan ke favorit sebelumnya.');
        }

        // Tambahkan buku ke favorit
        $favorite = new Favorite();
        $favorite->user_id = auth()->user()->id;
        $favorite->book_id = $request->book_id;
        $favorite->save();

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke favorit.');
    }

    public function showApiCategory($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $book,
        ]);
    }
}
