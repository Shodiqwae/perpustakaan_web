<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomePageCustomer extends Controller
{
    public function HomePageCustomer(){
        $books = Book::all();
        return view('HomePageCustomer.HomePageC', ['books' => $books]);
    }
}
