<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Function to view Wishlist Page
    public function index(){
        return view('pages.wishlist');
    }
}
