<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomepController extends Controller
{
    public function homePage()
    {
        $pendingLoans = Loan::where('status', 'pending')->get();

        // Kirim data peminjaman ke view
        return view('petugas.homeP', compact('pendingLoans'));
    }
    public function approveLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'dipinjam';
        $loan->borrow_date = now();
        $loan->return_date = Carbon::now()->addDays(7); // Atur tanggal pengembalian 7 hari dari sekarang
        $loan->save();

        return redirect()->back()->with('success', 'Loan approved successfully.');
    }
}
