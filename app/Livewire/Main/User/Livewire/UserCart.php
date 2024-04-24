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

    public function mount()
    {
        $deletedEntryIds = Cart::where('user_id', Auth::id())
                            ->whereDoesntHave('product', function($query) {
                                $query->where('status', '!=', 'deleted');
                            })
                            ->pluck('id');

        if ($deletedEntryIds->isNotEmpty()) {
            Cart::destroy($deletedEntryIds);
        }
    }

    public function render()
    {
        $this->cartEntries = Cart::where('user_id', Auth::id())->with('product.product_images')->get();
        $this->dispatch('cartUpdate');
        return view('livewire.main.user.livewire.user-cart');
    }

    public function changeQuantity($productId, $productQuantity)
    {
        // dd("$productId & $productQuantity");
        $productQuantity = (int) $productQuantity;
        $product = Cart::where('user_id', Auth::id())->where('product_id', $productId)->with('product')->first();
        if ($productQuantity <= 0) {
            $productQuantity = 1;
        } elseif ($productQuantity > $product->product->stockquantity) {
            $productQuantity = $product->product->stockquantity;
        }
        $product->quantity = $productQuantity;
        $product->save();
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
            $this->dispatch('alertNotif', ['message' => 'Product removed from cart', 'type' => 'negative']);
            $this->cartEntries = Cart::where('user_id', Auth::id())->with('product')->get();
            $this->checkCart();
        }
    }

    public function checkCart()
    {
        if ($this->cartEntries->isNotEmpty()) {
            $this->emptyCart = false;
        } else {
            $this->emptyCart = true;
        }
        $this->dispatch('cartCheck', $this->emptyCart);
    }
}
