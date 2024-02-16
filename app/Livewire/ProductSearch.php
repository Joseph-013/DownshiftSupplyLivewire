<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search;
    public $productId;
    public $quantity;

    protected $listeners = ['itemAdded'];

    public function render()
    {
        $results = [];
        if(strlen($this->search) > 0)
        {
            $results = Product::where('name', 'like', '%'.$this->search.'%')->get();
        }
        return view('livewire.product-search', compact('results'));
    }

    public function itemAdded($addedProductId, $addedQuantity)
    {
        $this->productId = $addedProductId;
        $this->quantity = $addedQuantity;
        dd($this->quantity);
    }
}
