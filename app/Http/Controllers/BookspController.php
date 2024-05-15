<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookspController extends Controller
{
    public function bookPage()
    {
        return view('petugas.books');
    }
}
