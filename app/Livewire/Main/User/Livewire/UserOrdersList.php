<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Detail;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserOrdersList extends Component
{

    use WithPagination;

    public $selectedOrder; //Id
    public $orderList; //products list purchase

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

    public function render()
    {
        $transactionList = Transaction::where('user_id', Auth::id())->paginate(10);
        // if (request()->has('orderId')) {
        //     $checkOrderTampering = Transaction::where([
        //         'user_id' => Auth::id(),
        //         'id' => request()->query('orderId'),
        //     ])->first();
        //     if ($checkOrderTampering) {
        //         $index = null;
        //         $transactions = Transaction::where('user_id', Auth::id())->get();
        //         foreach ($transactions as $key => $transaction) {
        //             if ($transaction->id === $checkOrderTampering) {
        //                 $index = $key;
        //                 break;
        //             }
        //         }
        //         $index = $index / 10 + 1;
        //         request()->merge(['page' => $index]);
        //     } else {
        //         abort(403, 'Unauthorized / Illegal Access');
        //     }
        // }
        return view('livewire.main.user.livewire.user-orders-list')->with(['transactionList' => $transactionList]);
    }

    public function showDetails($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        if ($transaction && $transaction->user_id == Auth::id()) {
            $this->dispatch('showDetails', transactionId: $transactionId);
            $this->orderList = Detail::where('transaction_id', $transactionId)->with('products')->get();
            $this->selectedOrder = $transactionId;
        } else {
            abort(403, "Unauthorized/Illegal Access.");
        }
    }
}
