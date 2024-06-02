<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailBookController extends Controller
{
    public function DetailBooks(){
        return view ('HomePageCustomer.detailbook');
    }
}
