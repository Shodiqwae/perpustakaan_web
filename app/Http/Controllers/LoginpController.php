<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginpController extends Controller
{
    public function loginPageP()
    {
        return view('petugas.loginP');
    }
}
