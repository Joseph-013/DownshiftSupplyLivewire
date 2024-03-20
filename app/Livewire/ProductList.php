<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $selectedProductId;
    public $itemTemplateToggle;

    #[On('renderProductList')]
    public function render()
    {
        // $this->selectedProductId = null;
        $products = Product::paginate(50);
        return view('livewire.main.admin.livewire.product-list')->with(['products' => $products]);
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        $this->dispatch('productSelected', $productId);
    }

    #[On('newProduct')]
    public function newProduct()
    {
        $this->render();
    }

    #[On('useItemTemplate')]
    public function itemTemplate($product)
    {
        if ($product == null) {
            $this->itemTemplateToggle = 0;
        } else {
            $this->itemTemplateToggle = $product;
        }
    }

    #[On('hideItemTemplate')]
    public function hideItemTemplate()
    {
        $this->itemTemplateToggle = null;
    }
}
