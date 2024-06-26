<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisAController extends Controller
{
    // Menampilkan formulir registrasi admin
    public function showRegistrationForm()
    {
        return view('admin.regisA');
    }

    // Memproses data registrasi admin
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan admin baru ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'administrator', // Atur peran sebagai administrator
        ]);

        // Redirect ke halaman login setelah registrasi selesai
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

}

