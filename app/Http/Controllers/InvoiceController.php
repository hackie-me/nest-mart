<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\VendorDetails;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Function to view Invoice Page
    public function index($id){
        $invoice = auth()->user()->userInvoice($id);
        // Get the Cart items from the Invoice
        $carts = [];
        foreach($invoice as $inv){
            $carts[] = Cart::find($inv->cart_id);
        }
        // Cart Sub Total
        $subTotal = 0;
        foreach($carts as $cart){
            $subTotal += $cart->product->price * $cart->quantity;
        }
        // Cart Tax
        $tax = $subTotal * (10/100);
        // Cart Total
        $total = $subTotal + $tax;
        // 2 digit after decimal point
        $subTotal = number_format($subTotal, 2);
        $tax = number_format($tax, 2);
        $total = number_format($total, 2);
        $payment_method = $invoice[0]->payment_method;
        $payment_status = $invoice[0]->payment_status;
        $user = auth()->user();
        $vendorDetails = VendorDetails::find($invoice[0]->vendor_id);
        $vendor = $vendorDetails->vendor;
        $invDate = $invoice[0]->created_at->format('d M Y');
        $invDueDate = $invoice[0]->due_date->format('d M Y');
        $invoice = $invoice[0];
        $data = compact('invoice', 'carts', 'payment_method', 'user', 'vendor', 'id', 'subTotal', 'tax', 'total', 'invDate', 'invDueDate', 'invoice', 'vendorDetails', 'payment_status');
        return view('pages.invoice', $data);
    }
}
