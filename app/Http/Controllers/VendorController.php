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
        $totalVendors = VendorDetails::count();
        $data = compact('vendors', 'totalVendors');
        return view('pages.vendor-list')->with($data);
    }

    // Function to view the details of a vendor
    public function viewDetails($id, $title)
    {
        $vendor = VendorDetails::find($id);
        $products = Product::where('vendor_id', $vendor->vendor_id)->paginate(10);
        $data = compact('vendor', 'products');
        return view('pages.vendor-details')->with($data);
    }
}
