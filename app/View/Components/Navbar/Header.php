<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $wishlist = route('wishlist');
        $cart = route('cart');
        if (!auth()->check()) {
            $wishlist = route('login');
            $cart = route('login');
        }
        $data = compact('wishlist', 'cart');
        return view('components.navbar.header')->with($data);
    }
}
