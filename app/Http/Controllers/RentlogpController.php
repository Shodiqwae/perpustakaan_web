<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class RentlogpController extends Controller
{
    public function rentPage()
    {
        // Mengambil data pinjaman
        $loans = Loan::all();

        // Menghitung jumlah pinjaman berdasarkan status
        $borrowedCount = Loan::where('status', 'dipinjam')->count();
        $completedCount = Loan::where('status', 'selesai')->count();
        $canceledCount = Loan::where('status', 'cancel')->count();

        // Mengirim data pinjaman dan jumlah pinjaman ke view
        return view('petugas.rent', compact('loans', 'borrowedCount', 'completedCount', 'canceledCount'));
    }
}
