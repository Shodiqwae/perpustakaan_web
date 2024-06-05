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
        $loans = Loan::where('user_id', auth()->user()->id)->get();
        return view('HomePageCustomer.HomePageC', compact('books', 'loans'));
    }
    public function ReturnedLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'selesai';
        $loan->save();

        return redirect()->back()->with('success', 'Loan approved successfully.');
    }

}
