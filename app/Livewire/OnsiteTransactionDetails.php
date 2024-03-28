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
        $this->renderDetails();
    }

    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    public function deleteTrans()
    {
        if ($this->selectedTransaction) {
            foreach($this->details as $detail) {
                $detail->delete();
            }
            $this->selectedTransaction->delete();
            $this->details = null;
            $this->selectedTransaction = null;
            $this->confirmDelete = false;
            $this->dispatch('renderTransactionList');
            $this->dispatch('alertNotif', 'Transaction deleted');
        }
    }

    #[On('renderTransactionDetails')]
    public function render()
    {
        if($this->details)
            $this->renderDetails();
        return view('livewire.main.admin.livewire.onsite-transaction-details');
    }

    public function modifyTrans()
    {
        $this->dispatch('useItemTemplate', transaction: $this->selectedTransaction->id);
    }

    public function renderDetails()
    {
        $this->details = $this->selectedTransaction->details;
    }
}
