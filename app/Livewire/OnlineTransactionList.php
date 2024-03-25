<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class OnlineTransactionList extends Component
{
    use WithPagination;

    public $selectedTransactionId;
    public $itemTemplateToggle;
    public $itemTemplateToggleRes;
    public $search;

    #[On('renderTransactionList')]
    public function render()
    {
        $transactions = Transaction::where('purchaseType', 'Online')
        ->where(function($query) {
            $query->where('firstName', 'like', '%' . $this->search . '%')
                ->orWhere('lastName', 'like', '%' . $this->search . '%');
        })
        ->paginate(50);
        return view('livewire.main.admin.livewire.online-transaction-list')->with(['transactions' => $transactions]);
    }

    #[On('searchResults')]
    public function searchResults($value)
    {
        $this->search = $value;
    }

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->toggleItemTemplate($transactionId);
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
