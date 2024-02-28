<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OnlineTransactionDetails extends Component
{
    public $selectedTransaction;
    public $newDate;
    public $newFirstname;
    public $newLastname;
    public $newGrandtotal;

    protected $listeners = ['transactionSelected'];

    public function mount()
    {
        $this->selectedTransaction = null;
    }

    public function transactionSelected($transactionId)
    {
        $this->selectedTransaction = Transaction::with('details')->find($transactionId);
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-details');
    }
}
