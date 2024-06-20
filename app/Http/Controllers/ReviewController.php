<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function storeRating(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $rating = Rating::create([
            'book_id' => $request->input('book_id'),
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);


        return response()->json(['success' => 'Rating submitted successfully!'], 200);
        try {
            // Proses menyimpan rating
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to submit rating.'], 500);
        }
    }
}

