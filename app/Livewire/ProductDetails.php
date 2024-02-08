<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetails extends Component
{
    public $selectedProduct;
    public $newName;
    public $newPrice;
    public $newStockquantity;
    public $newCriticallevel;
    public $newImage;

    protected $listeners = ['productSelected'];

    public function mount()
    {
        $this->selectedProduct = null;
    }

    public function productSelected($productId)
    {
        $this->selectedProduct = Product::find($productId);
        $this->newName = $this->selectedProduct->name;
        $this->newPrice = $this->selectedProduct->price;
        $this->newStockquantity = $this->selectedProduct->stockquantity;
        $this->newCriticallevel = $this->selectedProduct->criticallevel;
        $this->newImage = $this->selectedProduct->image;
    }

    public function deleteProduct()
    {
        if ($this->selectedProduct) {
            $this->selectedProduct->delete();
            $this->selectedProduct = null;
            $this->dispatch('productDeleted');
        }
    }

    public function updateProduct()
    {
        if ($this->selectedProduct) {
            $this->selectedProduct->name = $this->newName;
            $this->selectedProduct->price = $this->newPrice;
            $this->selectedProduct->stockquantity = $this->newStockquantity;
            $this->selectedProduct->criticallevel = $this->newCriticallevel;
            $this->selectedProduct->image = $this->newImage;
            $this->selectedProduct->save();
        }
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
