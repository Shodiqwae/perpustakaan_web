<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PetugasAController extends Controller
{
    // Menampilkan halaman untuk melihat daftar petugas
    public function PetugasA()
    {

        return view('admin.petugasA',);
    }

    // Menampilkan halaman untuk menambahkan petugas baru
    public function AddP()
    {
        return view('admin.petugasA-add');
    }
}
