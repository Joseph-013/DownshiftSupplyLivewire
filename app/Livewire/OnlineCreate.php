<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OnlineCreate extends Component
{
    public $statusOptions;
    public $transaction;
    public $courierUsed;
    public $shippingFee;
    public $trackingNumber;
    public $shippingAddress;
    public $status;

    public function mount($transaction)
    {
        $this->statusOptions = $this->getEnumValues('transactions', 'status');
        $this->transaction = Transaction::find($transaction);
        if($this->transaction) {
            $this->courierUsed = $this->transaction->courierUsed;
            $this->shippingFee = $this->transaction->shippingFee;
            $this->trackingNumber = $this->transaction->trackingNumber;
            $this->shippingAddress = $this->transaction->shippingAddress;
            $this->status = $this->transaction->status;

        }
        else {
            $this->courierUsed = null;
            $this->shippingFee = null;
            $this->trackingNumber = null;
            $this->shippingAddress = null;
            $this->status = null;
        }
    }

    public function render()
    {
        return view('livewire.online-create');
    }

    public function editTrans()
    {
        $currentTrans = $this->transaction;
        $this->validate([
            'courierUsed' => ['required', 'string'],
            'shippingFee' => ['required', 'numeric', 'min:0'],
            'trackingNumber' => ['required', 'string'],
            'shippingAddress' => ['required', 'string'],
            'status' => ['required', 'string']
        ]);

        if($this->courierUsed && $this->shippingFee && $this->trackingNumber && $this->shippingAddress && $this->status) {
            $currentTrans->courierUsed = $this->courierUsed;
            $currentTrans->shippingFee = $this->shippingFee;
            $currentTrans->trackingNumber = $this->trackingNumber;
            $currentTrans->shippingAddress = $this->shippingAddress;
            $currentTrans->status = $this->status;
            $currentTrans->save();

            $this->dispatch('alertNotif', 'Transaction successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
        }
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    public function getEnumValues($table, $column)
    {
        $columnInfo = DB::select("SHOW COLUMNS FROM $table WHERE Field = ?", [$column])[0]->Type;
        preg_match('/^enum\((.*)\)$/', $columnInfo, $matches);
        return explode(',', str_replace("'", '', $matches[1]));
    }
}
