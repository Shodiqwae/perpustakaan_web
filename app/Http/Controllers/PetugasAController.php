<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Untuk hashing password

class PetugasAController extends Controller
{
    // Menampilkan daftar petugas
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('admin.petugasA', compact('petugas'));
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('admin.petugasA-add');
    }

    // Menyimpan data petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
        ]);

        return redirect()->route('petugasA.index')->with('success', 'Petugas added successfully.');
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugasA-edit', compact('petugas'));
    }

    // Memperbarui data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8', // Tambahkan validasi untuk password baru
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Jika password baru disertakan dalam permintaan, perbarui password
        if ($request->has('password')) {
            $petugas->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('petugasA.index')->with('success', 'Petugas updated successfully.');
    }


    // Menghapus data petugas
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugasA.index')->with('success', 'Petugas deleted successfully.');
    }
}
