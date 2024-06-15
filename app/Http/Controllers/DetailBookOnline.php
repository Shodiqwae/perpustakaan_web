<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailBookOnline extends Controller
{
    public function showdetailform(){
        return view('HomePageCustomer.detailbookOnline');
    }
}
