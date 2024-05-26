<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepController extends Controller
{
    public function homePage()
    {
        return view('petugas.homeP');
    }
}
