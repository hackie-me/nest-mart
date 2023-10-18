<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    // Function to view the list of vendors
    public function viewList()
    {
        return view('pages.vendor-list');
    }

    // Function to view the details of a vendor
    public function viewDetails()
    {
        return view('pages.vendor-details');
    }
}
