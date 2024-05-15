<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentlogpController extends Controller
{
    public function rentPage()
    {
        return view('petugas.rent');
    }
}
