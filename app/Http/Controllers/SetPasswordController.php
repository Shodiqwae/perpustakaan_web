<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetPasswordController extends Controller
{
    public function SetPasswordPage(){
        return view ('LoginCustomer.setPassword');
    }
}
