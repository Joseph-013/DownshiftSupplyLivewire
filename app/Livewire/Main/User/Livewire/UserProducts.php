<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserProducts extends Component
{
    use WithPagination;

    public function addToCart($productId)
    {
        if (!auth()->check()) {
            return redirect()->route('user.products');
        }
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
            // dump("Userid $result->user_id has added productid $result->product_id to cart");
            $this->dispatch('alertNotif', 'Added to Cart');
        } else {
            $this->dispatch('alertNotif', 'Product already exists in your cart');
        }
    }

    public function render()
    {
        $products = Product::inRandomOrder()->paginate(30); //pagination links will disappear if total product number is less than specified to paginate
        return view('livewire.main.user.livewire.user-products')->with(['products' => $products]);
    }
}
