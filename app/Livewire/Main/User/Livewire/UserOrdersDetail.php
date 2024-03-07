<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use PHPUnit\Event\Tracer\Tracer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

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
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
        } else {
            abort(403, "Unauthorized/Illegal Access.");
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
