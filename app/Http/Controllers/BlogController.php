<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Function to view a list of all Blogs
    public function viewList(){
        return view('pages.blog-list');
    }

    // Function to view Blog Details
    public function viewDetails($title, $id){
        return view('pages.blog-details');
    }
}
