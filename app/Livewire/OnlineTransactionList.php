<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class OnlineTransactionList extends Component
{
    public $selectedTransactionId;
    public $transactions;

    #[On('transactionUpdated')]
    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-list');
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->dispatch('alertNotif', 'Transaction selected');
    }
}
