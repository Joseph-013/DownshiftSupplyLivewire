<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class OnsiteTransactionList extends Component
{
    use WithPagination;

    public $selectedTransactionId;

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->dispatch('alertNotif', 'Transaction selected');
    }

    public function render()
    {
        $transactions = Transaction::where('purchaseType', 'Onsite')->paginate(50);
        return view('livewire.main.admin.livewire.onsite-transaction-list')->with(['transactions' => $transactions]);
    }
}
