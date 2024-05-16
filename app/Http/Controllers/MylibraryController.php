<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MylibraryController extends Controller
{
    public function Mylibrary()
    {
        return view('HomePageCustomer.MyLibrary');
    }
}
