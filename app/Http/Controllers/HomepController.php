<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomepController extends Controller
{
    public function homePage()
    {
        $loans = Loan::whereIn('status', ['pending', 'dipinjam'])->get();
        // Kirim data peminjaman ke view
        return view('petugas.homeP', compact('loans'));
    }
    public function approveLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'dipinjam';
        $loan->borrow_date = now();
        $loan->return_date = Carbon::now()->addDays(1);
        $loan->save();

        return redirect()->back()->with('success', 'Loan approved successfully.');
    }
    public function ReturnedLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'selesai';
        $loan->save();

        return redirect()->back()->with('success', 'Loan returned successfully.');
    }
}
