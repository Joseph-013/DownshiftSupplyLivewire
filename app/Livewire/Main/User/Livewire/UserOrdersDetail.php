<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
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

        // $orderId = (int)$orderId;
        // if ($orderId != 0) {
        //     $order = Transaction::find($orderId);
        //     if ($order) {
        //         $this->render();
        //     } else {
        //         $this->transactionData = null;
        //     }
        // } else
        //     $this->transactionData = null;
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-orders-detail');
    }
}
