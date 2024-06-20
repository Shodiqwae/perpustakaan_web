<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use App\Models\Loan;
use App\Models\Book;

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

    // Memproses login API
    public function apiLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        }

        return response()->json([
            'error' => 'Unauthorized'
        ], 401);
    }


    public function storeLoan(Request $request)
    {
        // Validasi data input
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $bookId = $request->book_id;
        $userId = $request->user_id;

        // Periksa apakah buku tersebut sedang dipinjam atau telah selesai dipinjam oleh pengguna
        $existingLoan = Loan::where('book_id', $bookId)
            ->where('user_id', $userId)
            ->whereIn('status', ['selesai', 'dikembalikan'])
            ->first();

            $existingLoan = Loan::where('book_id', $request->book_id)
            ->where('user_id', $request->user_id)
            ->whereIn('status', ['selesai', 'dikembalikan'])
            ->first();

        if ($existingLoan) {
            // Jika ada, ubah status peminjaman menjadi 'pending'
            $existingLoan->status = 'pending';
            $existingLoan->borrow_date = now();
            $existingLoan->return_date = null; // Hapus tanggal pengembalian jika ada
            $existingLoan->save();

            // Kurangi stok buku
            $book = Book::findOrFail($request->book_id);
            $book->stock -= 1;
            $book->save();

            // Redirect atau respons ke aplikasi Flutter dengan status 201
            return response()->json(['success' => true, 'message' => 'Peminjaman berhasil'], 201);
        }

        // Periksa apakah pengguna sudah meminjam buku ini dalam status 'pending' atau 'dipinjam'
        $activeLoan = Loan::where('book_id', $bookId)
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'dipinjam'])
            ->first();

        if ($activeLoan) {
            return response()->json(['error' => true, 'message' => 'Anda sudah meminjam buku ini sebelumnya.'], 400);
        }

        // Periksa stok buku
        $book = Book::findOrFail($bookId);

        if ($book->stock <= 0) {
            return response()->json(['error' => true, 'message' => 'Stok buku habis, tidak dapat melakukan peminjaman'], 400);
        }

        // Simpan data peminjaman
        $loan = Loan::create([
            'book_id' => $bookId,
            'user_id' => $userId,
            'borrow_date' => now(),
            'status' => 'pending',
        ]);

        // Kurangi stok buku
        $book->stock--;
        $book->save();

        return response()->json(['error' => true, 'message' => 'Gagal membuat peminjaman'], 400);
    
        return response()->json(['success' => true, 'message' => 'Peminjaman berhasil dilakukan.', 'loan' => $loan], 201);
    }



    public function updateProfileApi(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk gambar
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;

        // Menghandle gambar jika diunggah
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $gambarName);
            $user->gambar = url('/uploads/' . $gambarName); // Simpan URL gambar ke database
        }

        $user->save();

        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }



    public function getUserProfile($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    return response()->json($user);
}


}

