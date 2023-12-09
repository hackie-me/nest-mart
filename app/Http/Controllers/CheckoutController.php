<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // Function to view Checkout Page
    public function index(){
        // check if the cart is empty
        if (auth()->user()->carts->count() == 0){
            return redirect()->route('cart');
        }
        return view('pages.checkout');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address_line_1' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'additional_information' => 'nullable',
            'payment_method' => 'required',
        ]);
        $invoiceNumber = 'INV-'.time();
        foreach (auth()->user()->carts as $cart){
            $vendor_id = $cart->product->vendor->user->id;
            $invoice = new Invoice();
            $invoice->invoice_number = $invoiceNumber;
            $invoice->due_date = now()->addDays(7);
            $invoice->first_name = $request->first_name;
            $invoice->last_name = $request->last_name;
            $invoice->company_name = $request->cname;
            $invoice->address_line_1 = $request->address_line_1;
            $invoice->address_line_2 = $request->address_line_2 ?? '';
            $invoice->country = $request->country;
            $invoice->city = $request->city;
            $invoice->zip_code = $request->postal_code;
            $invoice->phone = $request->phone;
            $invoice->email = $request->email;
            $invoice->additional_information = $request->additional_information;
            $invoice->payment_method = $request->payment_method;
            $invoice->cart_id = $cart->id;
            $invoice->vendor_id = $vendor_id;
            $invoice->user_id = auth()->user()->id;
            $invoice->save();
        }
        auth()->user()->carts()->update(['is_checkout' => true]);
        return redirect()->route('invoice', ['id' => $invoiceNumber]);
    }
}
