<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionList extends Component
{
    public function render()
    {
        $transactions = Transaction::all();
        return view('livewire.transaction-list', compact('transactions'));
    }
}
