<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Function to view Cart Page
    public function index(){
        return view('pages.cart');
    }

    public function addToCart(Request $request){
        $request->validate([
            'product_id' => 'required|numeric',
        ]);

        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity ?? 1;
        $cart->save();
        return redirect()->back();
    }

    public function updateCart(Request $request, $id){
        $request->validate([
            'quantity' => 'required|numeric',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->back();
    }

    public function removeCart($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
}
