<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OnlineTransactionDetails extends Component
{
    public $selectedTransaction;
    public $courierUsed;
    public $shippingFee;
    public $trackingNumber;
    public $shippingAddress;
    public $status;
    public $statusOptions;

    protected $listeners = ['transactionSelected'];

    public function mount()
    {
        $this->selectedTransaction = null;
        $this->statusOptions = $this->getEnumValues('transactions', 'status');
    }

    public function getEnumValues($table, $column)
    {
        $columnInfo = DB::select("SHOW COLUMNS FROM $table WHERE Field = ?", [$column])[0]->Type;
        preg_match('/^enum\((.*)\)$/', $columnInfo, $matches);
        return explode(',', str_replace("'", '', $matches[1]));
    }

    public function transactionSelected($transactionId)
    {
        $this->selectedTransaction = Transaction::with('details')->find($transactionId);
        $this->courierUsed = $this->selectedTransaction->courierUsed;
        $this->shippingFee = $this->selectedTransaction->shippingFee;
        $this->trackingNumber = $this->selectedTransaction->trackingNumber;
        $this->shippingAddress = $this->selectedTransaction->shippingAddress;
        $this->status = $this->selectedTransaction->status;
    }

    public function updateTransaction()
    {
        $this->validate([
            'status' => 'required',
        ]);

        $this->selectedTransaction->update([
            'courierUsed' => $this->courierUsed,
            'shippingFee' => $this->shippingFee,
            'trackingNumber' => $this->trackingNumber,
            'shippingAddress' => $this->shippingAddress,
            'status' => $this->status,
        ]);
        $this->dispatch('transactionUpdated');
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-details');
    }
}
