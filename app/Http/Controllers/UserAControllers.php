<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAControllers extends Controller
{
    // Menampilkan daftar user peminjam
    public function index()
    {
        $users = User::where('role', 'peminjam')->get();
        return view('admin.userA', compact('users'));
    }

    // Menampilkan form tambah user peminjam
    public function create()
    {
        return view('admin.userA-addData');
    }

    // Menyimpan data user peminjam baru
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
            'password' => bcrypt($request->password),
            'role' => 'peminjam',
        ]);

        return redirect()->route('userA.index')->with('success', 'User added successfully.');
    }

    // Menampilkan form edit user peminjam
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.userA-EditData', compact('user'));
    }

    // Memperbarui data user peminjam
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8', // Tambahkan validasi untuk password baru
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Jika password baru disertakan dalam permintaan, perbarui password
        if ($request->has('password')) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('userA.index')->with('success', 'User updated successfully.');
    }

    // Menghapus data user peminjam
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userA.index')->with('success', 'User deleted successfully.');
    }
}
