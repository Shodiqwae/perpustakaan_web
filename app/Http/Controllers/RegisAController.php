<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisAController extends Controller
{
    // Menampilkan halaman pendaftaran admin
    public function showRegistrationForm()
    {
        return view('admin.regisA');
    }

    // Menangani proses pendaftaran admin
// Menangani proses pendaftaran admin
public function register(Request $request)
{
    // Validasi data yang dikirim dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Cek apakah ada pengguna dengan nama dan email yang sama
    $existingUser = User::where('name', $request->name)
                        ->orWhere('email', $request->email)
                        ->first();

    // Jika pengguna dengan nama atau email yang sama ditemukan, tampilkan pesan kesalahan
    if ($existingUser) {
        return redirect()->back()->withInput()->withErrors(['name' => 'Username or email already exists.']);
    }

    // Membuat user baru dengan peran 'administrator'
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'administrator',
    ]);

    // Redirect ke halaman atau rute yang sesuai setelah pendaftaran berhasil
    return redirect()->route('home')->with('success', 'Admin registered successfully.');
}

}

