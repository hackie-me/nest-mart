<?php

namespace App\View\Components\Cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public mixed $category;
    public function __construct(mixed $items)
    {
        $this->category = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'category' => $this->category,
        ];
        return view('components.cards.category-card')->with($data);
    }
}
