<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $selectedProductId;
    public $products;

    protected $listeners = ['productDeleted', 'productCreated'];

    public function render()
    {
        return view('livewire.main.admin.livewire.product-list');
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
