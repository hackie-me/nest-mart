<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Function to view Cart Page
    public function index(){
        return view('pages.cart');
    }
}
