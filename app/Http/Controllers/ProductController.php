<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Function to view the list of products
    public function viewList()
    {
        $products = Product::paginate(10);
        $topCategories = Product::take(4)->get();
        $categories = Category::all();
        $data = [
            'products' => $products,
            'topCategories' => $topCategories,
            'categories' => $categories
        ];
        return view('pages.product-list')->with($data);
    }

    // Function to view the details of a product
    public function viewDetails($id, $title)
    {
        $product = Product::find($id);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->get();
        $data = [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ];
        return view('pages.product-details')->with($data);
    }
}
