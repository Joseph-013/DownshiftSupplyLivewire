<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OnlineCreate extends Component
{
    public $transaction;
    public $courierUsed;
    public $shippingFee;
    public $trackingNumber;
    public $shippingAddress;

    public function mount($transaction)
    {
        $this->transaction = Transaction::find($transaction);
        if($this->transaction) {
            $this->courierUsed = $this->transaction->courierUsed;
            $this->shippingFee = $this->transaction->shippingFee;
            $this->trackingNumber = $this->transaction->trackingNumber;
            $this->shippingAddress = $this->transaction->shippingAddress;
        }
        else {
            $this->courierUsed = null;
            $this->shippingFee = null;
            $this->trackingNumber = null;
            $this->shippingAddress = null;
        }
    }

    public function render()
    {
        return view('livewire.online-create');
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }
}
