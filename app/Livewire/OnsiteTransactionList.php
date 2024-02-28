<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OnsiteTransactionList extends Component
{
    public $selectedTransactionId;
    public $transactions;

    public function render()
    {
        return view('livewire.main.admin.livewire.onsite-transaction-list');
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
    }
}
