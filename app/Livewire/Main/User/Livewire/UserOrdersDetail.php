<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class UserOrdersDetail extends Component
{

    public $transactionData;
    public $orderList;

    #[On('showDetails')]
    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->transactionData = $transaction;
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
            $this->render();
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
    }

    public function mount($orderId)
    {
        if ($orderId != 0)
            $this->showDetails($orderId);
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-orders-detail');
    }

    public function confirmOrderReceived()
    {
        $this->dispatch('confirmationOverlay', data: [
            'positive' => 'Yes',
            'negative' => 'Cancel',
            'message' => 'This action is permanent.',
            'title' => 'Confirm order \'' . $this->transactionData->id . '\' is received?',
        ]);
    }

    #[On('positive')]
    public function setOrderComplete()
    {
        $this->transactionData->status = 'Complete';
        $this->transactionData->save();
        $this->dispatch('alertNotif', 'Order \'' . $this->transactionData->id . '\' is now completed');
        $this->dispatch('UserOrdersListRender');
    }
}
