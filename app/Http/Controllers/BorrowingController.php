<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use App\Http\Requests\BorrowingRequest;

class BorrowingController extends Controller
{
    public function create()
    {
        $books = Book::all();
        return view('HomePageCustomer.HomePageC', compact('books'));
    }

    public function store(BorrowingRequest $request)
    {
        $borrowing = new Borrowing();
        $borrowing->user_id = auth()->user()->id;
        $borrowing->book_id = $request->book_id;
        $borrowing->borrow_date = $request->borrow_date;
        $borrowing->return_date = $request->return_date;
        $borrowing->status = 'pending';
        $borrowing->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil diajukan, menunggu persetujuan');
    }

    public function pending()
    {
        $pendingBorrowings = Borrowing::where('status', 'pending')->get();
        return view('HomePageCustomer.RentCustomer', compact('pendingBorrowings'));
    }

    public function approve($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->status = 'approved';
        $borrowing->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui');
    }

    public function index()
    {
        $borrowings = Borrowing::where('user_id', auth()->user()->id)->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->status = 'returned';
        $borrowing->return_date = now();
        $borrowing->save();

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan');
    }
}
