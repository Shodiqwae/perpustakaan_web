<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite; // Pastikan Anda mengimpor model Favorite
use App\Models\Book; // Juga model Book jika belum diimpor sebelumnya
use App\Models\User;

class FavoritePageC extends Controller
{
    public function FavoritePage()
    {
        // Mengambil ID pengguna yang sedang login
        $userId = auth()->user()->id;

        // Mengambil data buku favorit pengguna dari database
        $favoriteBooks = Favorite::where('user_id', $userId)
                                 ->with('book') // Mengambil relasi buku
                                 ->get()
                                 ->pluck('book'); // Mengambil koleksi buku dari hasil query favorit

        // Mengirim data buku favorit ke tampilan Favorite.blade.php
        return view('HomePageCustomer.Favorite', compact('favoriteBooks'));
    }
    public function deleteFavorite($id)
    {
    // Temukan dan hapus buku favorit dari database
    Favorite::where('book_id', $id)->delete();

    return redirect()->back()->with('success', 'Book removed from favorites successfully.');
    }

    public function getFavoritesByUser($userId)
    {
        $favorites = Favorite::where('user_id', $userId)
            ->with('book')
            ->get()
            ->map(function ($favorite) {
                return $favorite->book;
            });

        return response()->json([
            'success' => true,
            'favorites' => $favorites
        ]);
    }

    public function checkFavorite($userId, $bookId)
    {
        $isFavorite = Favorite::where('user_id', $userId)
                              ->where('book_id', $bookId)
                              ->exists();

        return response()->json(['is_favorite' => $isFavorite]);
    }

    public function addToFavorites(Request $request)
    {
        $userId = $request->input('user_id');
        $bookId = $request->input('book_id');

        // Pastikan buku belum ada di favorit sebelumnya
        $isAlreadyFavorite = Favorite::where('user_id', $userId)
                                     ->where('book_id', $bookId)
                                     ->exists();

        if (!$isAlreadyFavorite) {
            $favorite = new Favorite();
            $favorite->user_id = $userId;
            $favorite->book_id = $bookId;
            $favorite->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Book already in favorites']);
        }
    }


    public function removeFromFavorites($id)
    {
        Favorite::where('book_id', $id)->delete();

        return response()->json(['success' => true]);
    }


}
