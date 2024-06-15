<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomepController extends Controller
{
    public function homePage()
    {
        // Periksa dan perbarui pinjaman yang telah melewati tanggal pengembalian
        $this->updateOverdueLoans();

        // Ambil pinjaman yang statusnya pending atau dipinjam
        $loans = Loan::whereIn('status', ['pending', 'dipinjam'])->get();

        // Kirim data pinjaman ke tampilan
        return view('petugas.homeP', compact('loans'));
    }

    public function approveLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'dipinjam';
        $loan->borrow_date = now();
        $loan->return_date = Carbon::now()->addDays(1);
        $loan->save();

        return redirect()->back()->with('success', 'Pinjaman berhasil disetujui.');
    }

    public function ReturnedLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'selesai';
        $loan->save();

        // Tambah stok buku
        $book = Book::findOrFail($loan->book_id);
        $book->stock += 1;
        $book->save();

        return redirect()->back()->with('success', 'Pinjaman berhasil dikembalikan.');
    }

    private function updateOverdueLoans()
    {
        // Ambil tanggal dan waktu saat ini
        $currentDate = Carbon::now();

        // Ambil semua pinjaman dengan status 'dipinjam'
        $loans = Loan::where('status', 'dipinjam')->get();

        // Iterasi setiap pinjaman
        foreach ($loans as $loan) {
            // Periksa apakah tanggal pengembalian telah lewat
            if ($loan->return_date < $currentDate) {
                // Perbarui status menjadi 'selesai'
                $loan->status = 'selesai';
                $loan->save();

                // Tambah stok buku
                $book = Book::findOrFail($loan->book_id);
                $book->stock += 1;
                $book->save();
            }
        }
    }
}
