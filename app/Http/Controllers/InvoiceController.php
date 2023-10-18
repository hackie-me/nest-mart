<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Function to view Invoice Page
    public function index(){
        return view('pages.invoice');
    }
}
