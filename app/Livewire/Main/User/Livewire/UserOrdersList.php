<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersList extends Component
{
    public function render()
    {
        $transactionList = Transaction::where('user_id', Auth::id())->get();
        return view('livewire.main.user.livewire.user-orders-list', compact('transactionList'));
    }

    public function showDetails($transactionId)
    {
        $this->dispatch('showDetails', transactionId: $transactionId)->to(UserOrdersDetail::class);
        $this->dispatch('alertNotif', 'Order selected');
        // dump("Order $orderId shown");
    }
}
