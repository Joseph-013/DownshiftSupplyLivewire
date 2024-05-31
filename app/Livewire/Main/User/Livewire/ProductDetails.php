<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductImages;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductDetails extends Component
{

    public $product;
    public $productImages;
    public $productCategory;

    public function render()
    {
        return view('livewire.main.user.livewire.product-details');
    }

    #[On('showDetails')]
    public function showDetails($productId)
    {
        $findProduct = Product::find($productId);
        if ($findProduct)
        {
            $this->product = $findProduct;
            $this->productImages = ProductImages::where('product_id', $productId)->get();
            $category = ProductCategories::where('id', $findProduct->category_id)->first();
            $this->productCategory = $category ? $category->category : null;
        }
    }

    public function hideDetails()
    {
        $this->product = null;
    }
}
