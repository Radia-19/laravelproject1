<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class  Card extends Component
{
    public $sale;
    public $itemName;
    public $star;
    public $cutPrice;
    public $price;

    /**
     * Create a new component instance.
     */
    public function __construct($itemName,$sale=false,$star=0,$cutPrice=false,$price='0.00')
    {
        $this->sale = $sale;
        $this->itemName = $itemName;
        $this->star = $star;
        $this->cutPrice = $cutPrice;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
