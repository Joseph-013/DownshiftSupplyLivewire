<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OnsiteTransactionDetails extends Component
{
    public $selectedTransaction;
    public $selfTransId;
    public $newDate;
    public $newFirstname;
    public $newLastname;
    public $newGrandtotal;

    protected $listeners = ['transactionSelected'];

    public function mount($transId)
    {
        if ($transId != 0)
            $this->selectedTransaction = $transId;
        else
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
        return view('livewire.main.admin.livewire.onsite-transaction-details');
    }
}
