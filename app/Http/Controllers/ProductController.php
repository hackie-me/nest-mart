<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Function to view the list of products
    public function viewList()
    {
        return view('pages.product-list');
    }

    // Function to view the details of a product
    public function viewDetails()
    {
        return view('pages.product-details');
    }
}
