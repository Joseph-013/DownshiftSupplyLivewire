<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class OnlineTransactionDetails extends Component
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
        $this->selectedTransaction = Transaction::with('details')->with('users')->find($transactionId);
        $this->details = $this->selectedTransaction->details;
        $this->selectedTransaction->viewedByAdmin = true;
        $this->selectedTransaction->save();
        $this->dispatch('updateBadge');
        $this->dispatch('loadMap', $this->selectedTransaction->shippingAddress);
    }


    #[On('renderTransactionDetails')]
    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-details');
    }

    public function modifyTrans()
    {
        $this->dispatch('useItemTemplate', transaction: $this->selectedTransaction->id);
    }
}
