<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\On;

class OnsiteTransactionDetails extends Component
{
    public $selectedTransaction;
    public $confirmDelete;
    public $details;

    public function mount()
    {
        $this->selectedTransaction = null;
        $this->confirmDelete = false;
    }

    #[On('transactionSelected')]
    public function transactionSelected($transactionId)
    {
        $this->selectedTransaction = Transaction::with('details')->find($transactionId);
        $this->details = $this->selectedTransaction->details;
    }

    #[On('renderTransactionDetails')]
    public function render()
    {
        return view('livewire.main.admin.livewire.onsite-transaction-details');
    }

    public function modifyTrans()
    {
        $this->dispatch('useItemTemplate', transaction: $this->selectedTransaction->id);
    }
}
