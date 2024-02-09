<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use App\Models\Product;

class UserProducts extends Component
{

    public $products;

    public function addToCart($productId) {
        dd("$productId is added to cart");
    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire..main.user.livewire.user-products');
    }
}
