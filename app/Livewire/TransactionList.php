<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionList extends Component
{
    public $selectedTransactionId;

    public function render()
    {
        $transactions = Transaction::all();
        return view('livewire.transaction-list', compact('transactions'));
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
    }
}
