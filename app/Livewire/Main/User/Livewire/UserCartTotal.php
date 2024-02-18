<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class UserCartTotal extends Component
{

    public $total = 0;

    #[On('cartUpdate')]
    public function render()
    {
        // temp solution for displaying total. better solution is to dispatch the total value from UserCart to prevent additional database access.
        $this->total = 0;
        $entries = Cart::where('user_id', Auth::id())->with('product')->get();
        if ($entries) {
            foreach ($entries as $entry) {
                $this->total += $entry->product->price * $entry->quantity;
            }
        }
        return view('livewire.main.user.livewire.user-cart-total');
    }
}
