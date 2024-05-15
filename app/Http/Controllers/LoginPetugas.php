<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPetugas extends Controller
{
    public function LoginPetugas(){
        return view ('petugas.loginP');
    }
}
