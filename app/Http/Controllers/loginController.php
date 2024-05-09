<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class loginController extends Controller
{
    public function LoginPage(){
        return view ('component.login');
    }
}
