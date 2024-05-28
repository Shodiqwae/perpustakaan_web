<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAControllers extends Controller
{
    public function UserA(){
        return view('admin.userA');
    }
}
