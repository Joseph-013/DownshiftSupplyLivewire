<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class UserCartCheckoutButton extends Component
{
    public $cartEntries;
    public $emptyCart;

    public function mount()
    {
        $this->cartEntries = Cart::where('user_id', Auth::id())->with('product')->get();
        if(!$this->cartEntries->isNotEmpty())
        {
            $this->emptyCart = true;
        }
        else
        {
            $this->emptyCart = false;
        }
    }
    
    public function checkout()
    {
        if ($this->cartEntries) {
            foreach ($this->cartEntries as $cartEntry) {
                if ($cartEntry->quantity > $cartEntry->product->stockquantity) {
                    $this->dispatch('alertNotif', ['message' => 'Some items exceed available stocks', 'type' => 'warning']);
                    return;
                }
            }
        }

        return redirect()->route('user.checkout');
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-cart-checkout-button');
    }

    #[On('cartCheck')]
    public function cartIsEmpty($value)
    {
        $this->emptyCart = $value;
    }
}
