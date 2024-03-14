<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OnsiteTransactionDetails extends Component
{
    public $selectedTransaction;
    // public $selfTransId;
    public $newDate;
    public $newFirstname;
    public $newLastname;
    public $newGrandtotal;
    public $details;
    public $contact;
    public $transactions;

    protected $listeners = ['transactionSelected'];

    public function mount($transId)
    {
        if ($transId != 0) {
            $transaction = Transaction::with('details')->find($transId);
            if ($transaction) {
                $this->selectedTransaction = $transaction->id;
                $this->details = $transaction->details;
                $this->newDate = $transaction->created_at;
                $this->contact = $transaction->contact;
                $this->newFirstname = $transaction->firstName;
                $this->newLastname = $transaction->lastName;
                $this->newGrandtotal = $transaction->grandTotal;
            } else {
                $this->selectedTransaction = null;
            }
        } else {
            $this->selectedTransaction = null;
        }
    }

    public function transactionSelected($transactionId)
    {
        $this->transactions = Transaction::with('details')->find($transactionId);
        if ($this->transactions) {
            $this->selectedTransaction = $transactionId;
            $this->details = $this->transactions->details;
            $this->newDate = $this->transactions->purchaseDate;
            $this->contact = $this->transactions->contact;
            $this->newFirstname = $this->transactions->firstName;
            $this->newLastname = $this->transactions->lastName;
            $this->newGrandtotal = $this->transactions->grandTotal;
        }
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.onsite-transaction-details');
    }
}
