<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorypController extends Controller
{
    public function categoryPage()
    {
        return view('petugas.category');
    }
}
