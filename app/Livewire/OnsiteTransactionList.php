<?php

namespace App\Livewire;

use Livewire\Component;

class OnsiteTransactionList extends Component
{
    public $selectedTransactionId;
    public $transactions;

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->dispatch('alertNotif', 'Transaction selected');
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.onsite-transaction-list');
    }
}
