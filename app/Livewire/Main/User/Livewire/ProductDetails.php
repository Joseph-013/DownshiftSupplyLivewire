<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{

    public $product;

    public function mount($productId)
    {
        $this->product = Product::find($productId);
        // dd($this->product->id);
    }

    public function render()
    {
        return view('livewire.main.user.livewire.product-details');
    }

    public function hideDetails()
    {
        $this->dispatch('toggleDetails', productId: null);
    }
}
