<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetails extends Component
{
    public $selectedProduct;

    protected $listeners = ['productSelected'];

    public function mount()
    {
        $this->selectedProduct = null;
    }

    public function productSelected($productId)
    {
        $this->selectedProduct = Product::find($productId);
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
