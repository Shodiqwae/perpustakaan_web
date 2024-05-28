<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisAController extends Controller
{
    public function RegisA()
    {
        return view('admin.regisA');
    }

    public function RegisC()
    {
        return view('LoginCustomer.regisC');
    }
}
