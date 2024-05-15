<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginpController extends Controller
{
    public function loginPage()
    {
        return view('petugas.loginP');
    }
}
