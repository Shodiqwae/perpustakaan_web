<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PeminjamanRegisterController extends Controller
{
    // Menampilkan formulir registrasi peminjam
    public function showRegistrationForm()
    {
        return view('LoginCustomer.regisC');
    }

    // Memproses data registrasi peminjam
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan peminjam baru ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peminjam', // Atur peran sebagai peminjam
        ]);

        // Redirect ke halaman login setelah registrasi selesai
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
