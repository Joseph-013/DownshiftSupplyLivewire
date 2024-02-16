<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionList extends Component
{
    public $selectedTransactionId;
    public $transactions;

    public function render()
    {
        return view('livewire.main.admin.livewire.transaction-list');
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
    }
}
