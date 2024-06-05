<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookLoan;


class RentlogpController extends Controller
{
    public function rentPage()
    {

        return view('petugas.rent',);
    }

    public function approveLoan($id)
    {
        $bookLoan = BookLoan::find($id);
        $bookLoan->status = 'dipinjam';
        $bookLoan->save();

        return redirect()->back()->with('success', 'Peminjaman buku berhasil di-approve!');
    }
}
