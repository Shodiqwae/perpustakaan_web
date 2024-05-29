<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    // Menampilkan formulir login
    public function showLoginForm()
    {
        return view('admin.loginA');
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect sesuai peran pengguna setelah login
            return redirect()->intended($this->redirectPath());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Redirect setelah login
    protected function redirectPath()
    {
        if (auth()->user()->role === 'administrator') {
            return '/admin/dashboard';
        } elseif (auth()->user()->role === 'petugas') {
            return '/petugas/dashboard';
        } elseif (auth()->user()->role === 'peminjam') {
            return '/peminjam/dashboard';
        }

        return '/';
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
