<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserProducts extends Component
{
    use WithPagination;
    public $selectedProductId;
    public $search;

    public function mount()
    {
        if (session()->has('complete')) {
            $transactionIds = session()->get('complete');
            $message = '';
            if (count($transactionIds) <= 1) {
                $message = $message . $transactionIds[0];
            } else {
                foreach ($transactionIds as $transactionId) {
                    $message = $message . $transactionId . ', ';
                }
                $message = substr($message, 0, -2);
            }

            $this->dispatch('confirmationOverlay', data: [
                'title' => 'Order/s exceeded 7 days in transit',
                'message' => 'Order/s ' . $message . ' have been set to complete. Thank you.',
                'neutral' => 'Ok',
            ]);

            session()->forget('complete');
        }
    }

    public function toggleDetails($productId)
    {
        $this->dispatch('showDetails', productId: $productId);
        $this->skipRender();
    }

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
        $this->skipRender();
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->inRandomOrder()->paginate(30); //pagination links will disappear if total product number is less than specified to paginate
        return view('livewire.main.user.livewire.user-products')->with(['products' => $products]);
    }

    #[On('searchResults')]
    public function searchResults($value)
    {
        $this->search = $value;
    }
}
