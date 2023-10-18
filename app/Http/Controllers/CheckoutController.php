<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Function to view Checkout Page
    public function index(){
        return view('pages.checkout');
    }
}
