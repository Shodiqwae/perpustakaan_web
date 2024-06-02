<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeAController extends Controller
{
    public function HomeA()
    {
        $categories = Category::all();
        return view('admin.homeA', ['categories' => $categories]);
    }
}
