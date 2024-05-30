<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailBookController extends Controller
{
    public function DetailBook()
    {
        return view('HomePageCustomer.detailbook');
    }
}
