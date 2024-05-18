<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;



class booksController extends Controller
{
    public function booksPage(Request $request)
    {
        $books = Book::all();
        return view('petugas.books', ['books' => $books]);
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
        ]);

        return response()->json($book, 201);
    }

    public function create()
    {
        $statusFromDatabase = "in stock"; // Ganti dengan cara Anda mengambil nilai dari database
        $categories = Category::all();
        return view('petugas.books-add', compact('statusFromDatabase'),  compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_code' => 'required',
            'title' => 'required',
            // Hapus validasi status
        ]);

        Book::create($request->all());

        return redirect()->route('books')
            ->with('success', 'Book added successfully.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $book->id,
            'title' => 'required',
            'author' => 'required',
            'status' => 'required'
        ]);

        $book->update($request->all());

        return redirect()->route('books')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books')->with('success', 'Book deleted successfully.');
    }
}

