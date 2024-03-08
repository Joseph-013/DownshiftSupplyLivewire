<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class UserCart extends Component
{

    public $cartEntries;
    public $emptyCart;
    public $hasExceeded;
    // public $productDetails;

    public function render()
    {
        $this->cartEntries = Cart::where('user_id', Auth::id())->with('product')->get();
        $this->dispatch('cartUpdate');
        return view('livewire.main.user.livewire.user-cart');
    }

    public function decrementQuantity($productId)
    {
        $product = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
        if ($product)
            if ($product->quantity > 1) {
                --$product->quantity;
                $product->save();
            }
    }

    public function incrementQuantity($productId)
    {
        $product = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
        if ($product) {
            $product->quantity += 1;
            $product->save();
        }
    }

    public function removeItem($productId)
    {
        $product = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
        if ($product) {
            $product->delete();
            $this->cartEntries = Cart::where('user_id', Auth::id())->with('product')->get();
            $this->checkCart();
        }
    }

    public function checkCart()
    {
        if($this->cartEntries->isNotEmpty())
        {
            $this->emptyCart = false;
        }
        else
        {
            $this->emptyCart = true;
        }
        $this->dispatch('cartCheck', $this->emptyCart);
    }
}
