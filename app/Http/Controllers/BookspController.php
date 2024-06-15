<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookspController extends Controller
{
    public function booksPage(Request $request)
    {
        $books = Book::all();
        return view('petugas.booksP', ['books' => $books]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('petugas.books-add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_code' => 'required',
            'title' => 'required',
            'author' => 'required',
            'image_book' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'nullable',
            'stock' => 'required|integer|min:0',
            'categories' => 'required|array'
        ]);

        $imagePath = $request->file('image_book')->store('images', 'public');

        $book = Book::create([
            'book_code' => $request->book_code,
            'title' => $request->title,
            'author' => $request->author,
            'image_book' => $imagePath,
            'description' => $request->description,
            'stock' => $request->stock
        ]);

        $book->categories()->sync($request->categories);

        return redirect()->route('books')
            ->with('success', 'Book added successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('petugas.books-edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'book_code' => 'required|unique:books,book_code,' . $book->id,
            'title' => 'required',
            'author' => 'required',
            'image_book' => 'image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required',
            'stock' => 'required|integer|min:0',
            'categories' => 'required|array'
        ]);

        $data = $request->all();

        if ($request->hasFile('image_book')) {
            // Hapus gambar lama jika ada
            if ($book->image_book) {
                Storage::disk('public')->delete($book->image_book);
            }
            $imagePath = $request->file('image_book')->store('images', 'public');
            $data['image_book'] = $imagePath;
        }

        $book->update($data);
        $book->categories()->sync($request->categories);

        return redirect()->route('books-edit', ['id' => $book->id])
            ->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($book->image_book) {
            Storage::disk('public')->delete($book->image_book);
        }

        // Hapus buku dari database
        $book->delete();

        return redirect()->route('books')
            ->with('success', 'Book deleted successfully.');
    }
}
