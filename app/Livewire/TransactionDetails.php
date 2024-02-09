<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionDetails extends Component
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
        $this->newDate = $this->selectedTransaction->purchaseDate;
        $this->newFirstname = $this->selectedTransaction->firstName;
        $this->newLastname = $this->selectedTransaction->lastName;
        $this->newGrandtotal = $this->selectedTransaction->grandTotal;
    }

    public function render()
    {
        return view('livewire.transaction-details');
    }
}
