<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use App\Models\Product;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class UserOrdersDetail extends Component
{

    public $transactionData;
    public $orderList;

    #[On('showDetails')]
    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->transactionData = $transaction;
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
            $this->render();
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
    }

    public function mount($orderId)
    {
        if ($orderId != 0)
            $this->showDetails($orderId);
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-orders-detail');
    }

    public function confirmOrderReceived()
    {
        $this->dispatch('confirmationOverlay', data: [
            'positive' => 'Yes',
            'negative' => 'Cancel',
            'message' => 'This action is permanent.',
            'title' => 'Confirm order \'' . $this->transactionData->id . '\' is received?',
            'key' => 'UserOrdersDetail',
        ]);
    }

    #[On('UserOrdersDetail_positive')]
    public function setOrderComplete()
    {
        $this->transactionData->status = 'Completed';
        if ($this->transactionData->details) {
            foreach ($this->transactionData->details as $detail) {
                $product = Product::findOrFail($detail->product_id);
                $product->stockquantity -= $detail->quantity;
                $product->save();
            }
        }
        $this->transactionData->save();
        $this->dispatch('alertNotif', ['message' => 'Order \'' . $this->transactionData->id . '\' is now completed', 'type' => 'positive']);
        $this->dispatch('UserOrdersListRender');
    }
}
