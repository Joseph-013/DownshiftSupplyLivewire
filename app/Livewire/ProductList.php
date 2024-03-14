<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductList extends Component
{
    public $selectedProductId;
    public $products;

    // protected $listeners = ['productDeleted', 'productCreated'];

    #[On('renderProductList')]
    public function render()
    {
        $this->selectedProductId = null;
        return view('livewire.main.admin.livewire.product-list');
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        $this->dispatch('productSelected', $productId);
    }

    #[On('newProduct')]
    public function newProduct()
    {
        $this->products = Product::all();
        $this->render();
    }
}
