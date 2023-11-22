<?php

namespace App\View\Components\Side;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AsideCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public mixed $categories;
    public function __construct(mixed $items)
    {
        $this->categories = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'categories' => $this->categories,
        ];
        return view('components.side.aside-category')->with($data);
    }
}
