<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserOrdersList extends Component
{

    use WithPagination;

    public $selectedOrder; //Id
    public $orderList; //products list purchase

    public function render()
    {
        $transactionList = Transaction::where('user_id', Auth::id())->simplePaginate(10);
        return view('livewire.main.user.livewire.user-orders-list')->with(['transactionList' => $transactionList]);
    }

    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->dispatch('showDetails', transactionId: $transactionId);
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
            $this->selectedOrder = $transactionId;
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
    }
}
