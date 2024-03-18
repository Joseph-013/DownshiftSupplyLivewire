<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class OnlineTransactionList extends Component
{
    use WithPagination;

    public $selectedTransactionId;

    #[On('transactionUpdated')]
    public function render()
    {
        $transactions = Transaction::where('purchaseType', 'Online')->paginate(50);
        return view('livewire.main.admin.livewire.online-transaction-list')->with(['transactions' => $transactions]);
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->dispatch('alertNotif', 'Transaction selected');
    }
}
