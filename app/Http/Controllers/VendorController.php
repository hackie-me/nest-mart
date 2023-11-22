<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\VendorDetails;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // Function to view the list of vendors
    public function viewList()
    {
        $vendors = VendorDetails::paginate(10);
        $data = compact('vendors');
        return view('pages.vendor-list')->with($data);
    }

    // Function to view the details of a vendor
    public function viewDetails($title)
    {
        $vendor = VendorDetails::where('name', $title)->first();
        $products = Product::where('vendor_id', $vendor->vendor_id)->paginate(10);
        $data = compact('vendor', 'products');
        return view('pages.vendor-details')->with($data);
    }
}
