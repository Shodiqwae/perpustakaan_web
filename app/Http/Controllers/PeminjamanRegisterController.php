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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Proses unggah gambar
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            $imageName = 'prf.png'; // Gambar default
        }

        // Simpan peminjam baru ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'peminjam', // Atur peran sebagai peminjam
            'gambar' => $imageName, // Simpan nama gambar
        ]);

        // Redirect ke halaman login setelah registrasi selesai
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
         // Mengembalikan respons JSON
    }


    public function apiRegister(Request $request)
    {
        try {
            // Validasi data input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Proses unggah gambar
            if ($request->hasFile('gambar')) {
                $imageName = time().'.'.$request->gambar->extension();
                $request->gambar->move(public_path('images'), $imageName);
            } else {
                $imageName = 'prf.png'; // Gambar default
            }

            // Simpan peminjam baru ke database
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'peminjam', // Atur peran sebagai peminjam
                'gambar' => $imageName, // Simpan nama gambar
            ]);

            // Mengembalikan respons JSON
            return response()->json([
                'success' => true,
                'message' => 'Registration successful. Please login.',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            Log::error('Registration Error: '.$e->getMessage()); // Log error

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
            ], 500);
        }
    }
}

