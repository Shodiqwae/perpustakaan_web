<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAController extends Controller
{
    public function HomeA()
    {
        return view('admin.homeA');
    }
}
