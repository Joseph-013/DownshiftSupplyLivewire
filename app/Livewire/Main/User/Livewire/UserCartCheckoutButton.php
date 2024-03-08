<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCartCheckoutButton extends Component
{
    public function checkout()
    {
        $cartEntries = Cart::where('user_id', Auth::id())->get();
        if ($cartEntries) {
            foreach ($cartEntries as $cartEntry) {
                // if($)
            }
        }
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-cart-checkout-button');
    }
}
