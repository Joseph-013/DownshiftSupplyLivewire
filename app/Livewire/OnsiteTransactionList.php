<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class OnsiteTransactionList extends Component
{
    use WithPagination;

    public $selectedTransactionId;
    public $itemTemplateToggle;
    public $itemTemplateToggleRes;

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->toggleItemTemplate($transactionId);
    }

    #[On('renderTransactionList')]
    public function render()
    {
        $transactions = Transaction::where('purchaseType', 'Onsite')->paginate(50);
        return view('livewire.main.admin.livewire.onsite-transaction-list')->with(['transactions' => $transactions]);
    }

    #[On('useItemTemplate')]
    public function itemTemplate($transaction)
    {
        if ($transaction == null) {
            $this->itemTemplateToggle = 0;
        }
        else {
            $this->itemTemplateToggle = $transaction;
        }
    }

    #[On('hideItemTemplate')]
    public function hideItemTemplate()
    {
        $this->itemTemplateToggle = null;
        $this->itemTemplateToggleRes = null;
    }

    #[On('toggleItemTemplate')]
    public function toggleItemTemplate($value)
    {
        if ($value == null) {
            $this->itemTemplateToggleRes = null;
        } elseif ($value == false) {
            $this->itemTemplateToggleRes = false;
        } else {
            $this->itemTemplateToggleRes = $value;
        }
    }
}   

