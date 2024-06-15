<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsiDetailBook extends Controller
{
    public function showdetailform(){
        return view('HomePageCustomer.isidetailbook');
    }
}
