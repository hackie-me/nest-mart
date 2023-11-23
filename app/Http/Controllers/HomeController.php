<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\VendorDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Function to view the home page
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $popularCategories = Category::orderBy('created_at', 'desc')->take(5)->get();
        $shopByCategory = $categories;
        $popularProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        // Take 3 Random Products
        $topSellingProducts = Product::inRandomOrder()->take(3)->get();
        $trendingProducts = Product::inRandomOrder()->take(3)->get();
        $recentlyAdded = Product::orderBy('created_at', 'desc')->take(3)->get();
        $topRated = Product::inRandomOrder()->take(3)->get();
        $data = compact('popularProducts', 'popularCategories', 'shopByCategory', 'topSellingProducts', 'trendingProducts', 'recentlyAdded', 'topRated', 'categories');
        return view('welcome')->with($data);
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
