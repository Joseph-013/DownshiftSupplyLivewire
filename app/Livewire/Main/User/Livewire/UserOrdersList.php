<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserOrdersList extends Component
{

    use WithPagination;

    public $selectedOrder; //Id
    public $orderList; //products list purchase
    public $itemTemplateToggleRes;
    public $previousRes;

    public function mount()
    {
        if (request()->has('orderId')) {
                $checkOrderTampering = Transaction::where([
                    'user_id' => Auth::id(),
                    'id' => request()->query('orderId'),
                ])->first();
            if ($checkOrderTampering) {
                $this->selectedOrder = $this->showDetails(request()->query('orderId'));
            } else {
                abort(403, 'Unauthorized / Illegal Access');
            }
        }
    }

    #[On('UserOrdersListRender')]
    public function render()
    {
        $transactionList = Transaction::where([
            'user_id' => Auth::id(),
            'purchaseType' => 'Online',
        ])->paginate(10);
        return view('livewire.main.user.livewire.user-orders-list')->with(['transactionList' => $transactionList]);
    }

    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->dispatch('showDetails', transactionId: $transactionId);
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
            $this->selectedOrder = $transactionId;
            $this->toggleItemTemplate($transactionId);
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
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

    #[On('hideItemTemplate')]
    public function hideItemTemplate()
    {
        $this->previousRes = $this->itemTemplateToggleRes;
        $this->itemTemplateToggleRes = null;
    }

    #[On('showItemTemplate')]
    public function showItemTemplate()
    {
        $this->itemTemplateToggleRes = $this->previousRes;
    }
}
