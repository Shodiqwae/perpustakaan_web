<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookLoan;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil semua data peminjaman buku
        $bookLoans = BookLoan::all();

        // Kirim data peminjaman buku ke view
        return view('HomePageCustomer.RentCustomer', compact('bookLoans'));
    }


}
