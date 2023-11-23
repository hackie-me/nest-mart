<?php

namespace App\View\Components\Cards;

use App\Models\Product;
use App\Models\VendorDetails;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     */
    public Product $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'product' => $this->product,
        ];
        return view('components.cards.product-card')->with($data);
    }
}
