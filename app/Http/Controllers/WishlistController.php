<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Function to view Wishlist Page
    public function index(){
        return view('pages.wishlist');
    }

    public function addWishlist(Request $request){
        $request->validate([
            'product_id' => 'required|numeric',

        ]);

        $wishlist = new WishList();
        $wishlist->user_id = auth()->user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();
        return redirect()->route('wishlist');
    }

    public function removeWishlist($id){
        $wishlist = WishList::findOrFail($id);
        $wishlist->delete();
        return redirect()->route('wishlist');
    }
}
