<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgotController extends Controller
{
    public function forgotPage(){
        return view ('component.forgot');
    }
}
