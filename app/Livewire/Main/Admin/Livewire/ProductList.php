<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductList extends Component
{
    public $selectedProductId;
    public $products;

    // protected $listeners = ['productDeleted', 'productCreated'];

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.main.admin.livewire.product-list');
    }

    #[On('productDeleted')]
    public function productDeleted()
    {
        // Product::find($productId)->delete();
        $this->render();
    }

    #[On('productCreated')]
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
