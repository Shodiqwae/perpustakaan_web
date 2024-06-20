<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class HomePageCustomer extends Controller
{
    public function getBookRating($book_id)
    {
        // Mengambil nilai rata-rata rating dari buku dengan ID tertentu
        $average_rating = Rating::where('book_id', $book_id)->avg('rating');

        return response()->json([
            'average_rating' => $average_rating,
        ]);
    }
    public function index()
    {
        $this->updateLoanStatus();

        $books = Book::with('ratings')->get();

        // Hitung rata-rata rating untuk setiap buku
        foreach ($books as $book) {
            $book->average_rating = $book->ratings->avg('rating') ?: 0;
        }

        $userLoans = Loan::where('user_id', auth()->user()->id)
                         ->whereIn('status', ['pending', 'dipinjam'])
                         ->pluck('book_id')
                         ->toArray();

        $loans = Loan::where('user_id', auth()->user()->id)->get();

        return view('HomePageCustomer.HomePageC', compact('books', 'loans', 'userLoans'));
    }

    public function CancelLoan($id)
    {
        $loan = Loan::findOrFail($id);

        // Tambah stok buku yang dibatalkan
        $book = Book::findOrFail($loan->book_id);
        $book->stock += 1;
        $book->save();

        // Ubah status peminjaman menjadi 'cancel'
        $loan->status = 'cancel';
        $loan->save();

        return redirect()->route('peminjam.home');
    }

    public function BorrowAgain($id)
    {
        // Cari peminjaman berdasarkan ID
        $loan = Loan::findOrFail($id);

        // Periksa apakah peminjaman sudah selesai
        if ($loan->status !== 'selesai') {
            return redirect()->back()->with('error', 'Peminjaman tidak dapat diulang.');
        }

        // Periksa apakah stok buku mencukupi
        $book = Book::findOrFail($loan->book_id);
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        $book->stock -= 1;
        $book->save();

        // Ubah status peminjaman menjadi 'pending' dan atur tanggal peminjaman kembali
        $loan->status = 'pending';
        $loan->borrow_date = now();
        $loan->return_date = null; // Bersihkan tanggal pengembalian jika diperlukan
        $loan->save();

        return redirect()->back()->with('success', 'Peminjaman ulang berhasil dilakukan.');
    }

    public function BorrowAgainApi($id)
{
    // Find the loan by ID
    $loan = Loan::findOrFail($id);

    // Check if the loan status is 'selesai'
    if ($loan->status !== 'selesai') {
        return response()->json(['error' => 'Peminjaman tidak dapat diulang.'], 400);
    }

    // Check if the book stock is sufficient
    $book = Book::findOrFail($loan->book_id);
    if ($book->stock < 1) {
        return response()->json(['error' => 'Stok buku tidak mencukupi.'], 400);
    }

    // Decrease the book stock
    $book->stock -= 1;
    $book->save();

    // Update the loan status to 'pending' and reset the borrow date
    $loan->status = 'pending';
    $loan->borrow_date = now();
    $loan->return_date = null; // Clear the return date if needed
    $loan->save();

    return response()->json(['success' => 'Peminjaman ulang berhasil dilakukan.'], 200);
}




    public function updateLoanStatus()
    {
        $loans = Loan::where('return_date', '<', Carbon::now())
                     ->where('status', 'pending')
                     ->get();

        foreach ($loans as $loan) {
            $loan->status = 'selesai';
            $loan->save();

            // Tambah stok buku ketika status menjadi selesai
            $book = Book::findOrFail($loan->book_id);
            $book->stock += 1;
            $book->save();
        }
    }

    public function showProfile()
    {
        $user = auth()->user();
        return view('HomePageCustomer.HomePageC', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $imageName);
            $user->gambar = $imageName;
        }

        $user->name = $request->username;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $rating = Rating::create([
            'book_id' => $request->input('book_id'),
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }

    public function storeRatingApi(Request $request)
    {
        try {
            $request->validate([
                'loan_id' => 'required|exists:user_loans,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
            ]);

            $loan = UserLoan::findOrFail($request->loan_id);

            $rating = new Rating();
            $rating->book_id = $loan->book_id;
            $rating->user_id = $loan->user_id;
            $rating->rating = $request->rating;
            $rating->comment = $request->comment;
            $rating->save();

            return response()->json(['message' => 'Review submitted successfully'], 200);
        } catch (\Exception $e) {
            // Cetak pesan kesalahan untuk debug
            dd($e->getMessage());
        }
    }

    public function getUserLoans($id)
    {
        // Ambil semua peminjaman yang terkait dengan pengguna berdasarkan ID pengguna
        $userLoans = Loan::with('book')
                         ->where('user_id', $id)
                         ->whereIn('status', ['pending', 'dipinjam', 'selesai'])
                         ->get();

        return response()->json($userLoans);
    }

    public function cancelLoanApi(Request $request)
    {
        // Validasi input
        $request->validate([
            'loan_id' => 'required|integer|exists:loans,id',
        ]);

        // Ambil peminjaman berdasarkan ID
        $loan = Loan::find($request->loan_id);

        // Pastikan status peminjaman saat ini adalah 'pending'
        if ($loan->status === 'pending') {
            // Ubah status menjadi 'cancel'
            $loan->status = 'cancel';
            $loan->save();

            // Ambil buku yang terkait dengan peminjaman ini
            $book = Book::find($loan->book_id);

            // Tambahkan stok buku kembali
            $book->stock += 1;
            $book->save();

            return response()->json(['message' => 'Loan cancelled successfully.']);
        } else {
            return response()->json(['message' => 'Loan cannot be cancelled.'], 400);
        }
    }
}
