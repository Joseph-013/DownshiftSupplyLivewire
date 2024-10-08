<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCheckoutList extends Component
{
    public $cartItems;
    public $cartTotal;

    public function render()
    {
        $this->cartItems = Cart::where('user_id', Auth::id())->with('product.product_images')->get();
        if (!$this->cartItems) {
            $this->redirect(route('user.cart'));
        } else {
            $this->cartTotal = 0.0;
            foreach ($this->cartItems as $item) {
                $this->cartTotal += $item->quantity * $item->product->price;
            }
        }

        return view('livewire.main.user.livewire.user-checkout-list');
    }
}
