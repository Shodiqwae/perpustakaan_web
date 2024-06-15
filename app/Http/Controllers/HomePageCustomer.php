<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomePageCustomer extends Controller
{

    public function index()
    {
        $this->updateLoanStatus();
        $books = Book::all();
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
        $loan = Loan::findOrFail($id);

        // Kurangi stok buku
        $book = Book::findOrFail($loan->book_id);
        if ($book->stock < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }
        $book->stock -= 1;
        $book->save();

        $loan->status = 'pending';
        $loan->borrow_date = now();
        $loan->return_date = null;
        $loan->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil dilakukan.');
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
