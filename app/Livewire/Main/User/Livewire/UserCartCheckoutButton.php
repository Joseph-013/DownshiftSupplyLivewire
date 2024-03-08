<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCartCheckoutButton extends Component
{
    public function checkout()
    {
        $cartEntries = Cart::where('user_id', Auth::id())->with('product')->get();
        if ($cartEntries) {
            foreach ($cartEntries as $cartEntry) {
                if ($cartEntry->quantity > $cartEntry->product->stockquantity) {
                    $this->dispatch('alertNotif', 'Some items exceed available stocks');
                    return;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-cart-checkout-button');
    }
}
