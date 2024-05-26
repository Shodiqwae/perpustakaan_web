<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritePageC extends Controller
{
    public function FavoritePage(){
        return view ('HomePageCustomer.Favorite');
    }
}
