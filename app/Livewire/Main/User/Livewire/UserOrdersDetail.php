<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Transaction;
use App\Models\Detail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class UserOrdersDetail extends Component
{

    private $transactionData;
    private $orderList;

    #[On('showDetails')]
    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->transactionData = $transaction;
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('product')->get();
        } else {
            dump('Unauthorized Access');
        }
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-orders-detail')->with([
            'transactionData' => $this->transactionData,
            'orderList' => $this->orderList,
        ]);
    }
}
