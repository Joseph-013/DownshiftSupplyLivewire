<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserProducts extends Component
{
    public $products;

    public function addToCart($productId)
    {
        $userId = Auth::id();
        $productSelected = Product::findOrFail($productId);
        $existingCartEntry = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if (!$existingCartEntry) {
            $result = Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                // 'subtotal' => $productSelected->price,
            ]);
            dump("Userid $result->user_id has added productid $result->product_id to cart");
        } else {
            // dump("$productId already exists in cart");
        }
    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire..main.user.livewire.user-products');
    }
}
