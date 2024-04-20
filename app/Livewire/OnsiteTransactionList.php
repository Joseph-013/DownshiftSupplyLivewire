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
    public $search;

    public function selectTransaction($transactionId)
    {
        $this->selectedTransactionId = $transactionId;
        $this->dispatch('transactionSelected', $transactionId);
        $this->toggleItemTemplate($transactionId);
    }

    #[On('searchResults')]
    public function searchResults($value)
    {
        $this->search = $value;
    }

    #[On('useItemTemplate')]
    public function itemTemplate($transaction)
    {
        if ($transaction == null) {
            $this->itemTemplateToggle = 0;
        } else {
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


    public $sortBy = 'created_at';
    public $sortOrder = "desc";
    public $filterStatus = "All";

    public function sort($by)
    {
        //parse to column
        if ($by === 'id') {
            $by = 'id';
        } elseif ($by === 'date') {
            $by = 'created_at';
        } elseif ($by === 'total') {
            $by = 'grandTotal';
        } elseif ($by === 'customer') {
            $by = 'firstName';
        }


        if ($this->sortBy === $by) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $by;
            if ($by === 'created_at')
                $this->sortOrder = 'desc';
            else
                $this->sortOrder = 'asc';
        }
    }

    #[On('renderTransactionList')]
    public function render()
    {
        $transactions = Transaction::where('purchaseType', 'Onsite')
            ->where(function ($query) {
                $query->where('firstName', 'like', '%' . $this->search . '%')
                    ->orWhere('lastName', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortOrder)
            ->paginate(50);
        return view('livewire.main.admin.livewire.onsite-transaction-list')->with(['transactions' => $transactions]);
    }
}
