<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
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

    public $showCategoriesWindow = false;

    public $sortBy = 'name';
    public $sortOrder = "asc";
    public $filterStatus = "All";
    public $categories = [];

    public function fetchCategories()
    {
        $this->categories = ProductCategories::pluck('category')->toArray();
    }

    public function sort($by)
    {
        //parse to column
        if ($by === 'itemName') {
            $by = 'name';
        } elseif ($by === 'remaining') {
            $by = 'stockquantity';
        }

        if ($this->sortBy === $by) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $by;
            $this->sortOrder = 'asc';
        }
    }

    #[On('setCategoriesWindow')]
    public function setCategoriesWindow($visibility)
    {
        $this->showCategoriesWindow = $visibility;
    }

    public function filter($by)
    {
        $this->filterStatus = $by;
    }

    #[On('renderProductList')]
    public function render()
    {
        $this->fetchCategories();

        if ($this->filterStatus === "All") {
            $products = Product::where('status', 'Existing')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortOrder)
                ->paginate(50);
        } else {
            $products = Product::where('status', 'Existing')
                ->where('name', 'like', '%' . $this->search . '%')
                ->whereHas('product_categories', function ($query) {
                    $query->where('category', $this->filterStatus);
                })
                ->orderBy($this->sortBy, $this->sortOrder)
                ->paginate(50);
        }



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
