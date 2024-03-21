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
    public $itemTemplateToggleRes;
    public $search;

    #[On('renderProductList')]
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                    ->paginate(50);
        return view('livewire.main.admin.livewire.product-list')->with(['products' => $products]);
    }

    #[On('searchResults')]
    public function searchResults($value)
    {
        $this->search = $value;
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        $this->dispatch('productSelected', $productId);
        $this->toggleItemTemplate($productId);
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
        $this->itemTemplateToggleRes = null;
    }

    #[On('toggleItemTemplate')]
    public function toggleItemTemplate($value)
    {
        if ($value == null) {
            $this->itemTemplateToggleRes = null;
        } elseif ($value == false) {
            $this->itemTemplateToggleRes = false;
        } else {
            $this->itemTemplateToggleRes = $value;
        }
    }
}
