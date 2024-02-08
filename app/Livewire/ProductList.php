<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $selectedProductId;

    protected $listeners = ['productDeleted', 'productCreated'];

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-list', compact('products'));
    }

    public function productDeleted($productId)
    {
        Product::find($productId)->delete();
        $this->render();
    }

    public function productCreated()
    {
        $this->render();
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        $this->dispatch('productSelected', $productId);
    }
}