<?php

namespace App\Livewire;

use App\Models\Detail;
use App\Models\Transaction;
use Livewire\Component;

class OrderOverlay extends Component
{
    public $transactionData;
    public $orderList;

    public function mount($order)
    {
        $this->transactionData = Transaction::find($order);
        $this->orderList = Detail::where('transaction_id', $order)->with('products')->get();
    }

    public function render()
    {
        return view('livewire.order-overlay');
    }

    public function confirmOrderReceived()
    {
        $this->dispatch('hideItemTemplate');
        $this->dispatch('confirmationOverlay', data: [
            'positive' => 'Yes',
            'negative' => 'Cancel',
            'message' => 'This action is permanent.',
            'title' => 'Confirm order \'' . $this->transactionData->id . '\' is received?',
        ]);
    }
}
