<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('test', function (){
    $data = auth()->user()->wishlists;
   return response()->json($data);
});
Route::redirect('login', 'panel/user')->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('wishlist')->group(function(){
    Route::get('/', [WishListController::class, 'index'])->name('wishlist');
    Route::get('/add', [WishListController::class, 'addWishlist'])->name('wishlist.add');
    Route::get('/remove/{id}', [WishListController::class, 'removeWishlist'])->name('wishlist.remove');
});
Route::prefix('cart')->group(function(){
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    // clear cart
    Route::get('/clear', function (){
        auth()->user()->carts()->delete();
        return redirect()->back();
    })->name('cart.clear');
});
Route::get('invoice/{id}', [InvoiceController::class, 'index'])->name('invoice');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('about-us', [HomeController::class, 'viewAbout'])->name('about-us');
Route::get('privacy-policy', [HomeController::class, 'viewPolicy'])->name('privacy-policy');
Route::get('terms-and-conditions', [HomeController::class, 'viewTerms'])->name('terms-and-conditions');


Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class, 'viewList'])->name('products');
    Route::get('/{id}/{title}', [ProductController::class, 'viewDetails'])->name('product');
});

Route::prefix('vendor')->group(function(){
    Route::get('/', [VendorController::class, 'viewList'])->name('vendors');
    Route::get('/{id}/{title}', [VendorController::class, 'viewDetails'])->name('vendor');
});
