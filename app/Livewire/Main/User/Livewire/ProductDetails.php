<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductDetails extends Component
{

    public $product;

    public function render()
    {
        return view('livewire.main.user.livewire.product-details');
    }

    #[On('showDetails')]
    public function showDetails($productId)
    {
        $findProduct = Product::find($productId);
        if ($findProduct)
            $this->product = $findProduct;
    }

    public function hideDetails()
    {
        $this->product = null;
    }
}
