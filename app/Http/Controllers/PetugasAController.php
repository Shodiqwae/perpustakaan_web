<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasAController extends Controller
{
    public function PetugasA()
    {
        return view('petugasA');
    }

    public function AddP()
    {
        return view('petugasA-add');
    }
}
