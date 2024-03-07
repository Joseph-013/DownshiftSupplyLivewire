<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class UserOrdersList extends Component
{

    // Window Width Logic
    public $windowWidth = 9999;
    public $initialRender = true;

    #[On('windowWidthChange')]
    public function handlerWidthChange($width)
    {
        $this->windowWidth = $width;
        // dump("new width: " . $width);
    }
    // -- Window Width Logic --



    public $selectedOrder;
    // public $isCompact = false;

    public function render()
    {

        if ($this->initialRender == true) {
            $this->dispatch('initialRender', permit: $this->initialRender);
            $this->initialRender = false;
        }

        $transactionList = Transaction::where('user_id', Auth::id())->get();
        return view('livewire.main.user.livewire.user-orders-list', compact('transactionList'));
    }

    // public function hydrate()
    // {
    // }

    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            if ($this->windowWidth >= 1024)
                $this->dispatch('showDetails', transactionId: $transactionId);
            // else
            //     $this->hydrate();
            $this->selectedOrder = $transactionId;
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
        // dump("Order $orderId shown");
    }
}
