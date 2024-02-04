<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $selectedProductId;

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-list', compact('products'));
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        dd($productId);
    }
}