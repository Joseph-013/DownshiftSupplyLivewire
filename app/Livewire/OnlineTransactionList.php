<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class OnlineTransactionList extends Component
{
    public $selectedTransactionId;
    public $transactions;

    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-list');
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
    }
}
