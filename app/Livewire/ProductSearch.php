<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $search;
    public $results;

    protected $listeners = ['itemAdded'];

    public function render()
    {
        $results = [];
        if(strlen($this->search) > 0)
        {
            $this->results = Product::where('name', 'like', '%'.$this->search.'%')
                        ->take(8)
                        ->get();
        } else {
            $this->results = [];
        }
        return view('livewire.product-search', compact('results'));
    }

    public function itemAdded($productId, $quantity)
    {
        $this->dispatch('addedItem', $productId, $quantity);
        $this->search = '';
        $this->results = [];
    }
}
