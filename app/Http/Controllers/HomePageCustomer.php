<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageCustomer extends Controller
{
    public function HomePageCustomer(){
        return view ('HomePageCustomer.HomePageC');
    }
}
