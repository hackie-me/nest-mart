<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Function to view the home page
    public function index()
    {
        return view('welcome');
    }

    // Function to view About Us page
    public function viewAbout()
    {
        return view('pages.about');
    }

    // Function to view Privacy Policy page
    public function viewPolicy()
    {
        return view('pages.policy');
    }

    // Function to view Terms and Conditions page
    public function viewTerms()
    {
        return view('pages.terms');
    }
}
