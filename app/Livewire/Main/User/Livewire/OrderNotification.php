<?php

namespace App\Livewire\Main\User\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderNotification extends Component
{
    public $transaction;
    public $showOverlay = true;
    public $daysEllapsed;
    public $transactionCount = 0;

    public function findDetails()
    {
        $this->daysEllapsed = Carbon::now()->diffInDays(Carbon::parse($this->transaction->intransit_at));
    }

    public function notYet()
    {
        $this->transactionCount++;
    }

    public function showMe()
    {
        $index = null;
        $transactions = Transaction::where('user_id', Auth::id())->get();
        foreach ($transactions as $key => $transaction) {
            if ($transaction->id === $this->transaction->id) {
                $index = $key;
                break;
            }
        }
        $index = $index / 10 + 1;
        return Redirect::to(route('user.orders', ['orderId' => $this->transaction->id, 'page' => $index]));
    }

    public function completeTransaction()
    {
        $this->transaction->status = 'Completed';
        if ($this->transaction->details) {
            foreach ($this->transaction->details as $detail) {
                $product = Product::findOrFail($detail->product_id);
                $product->stockquantity -= $detail->quantity;
                $product->save();
            }
        }
        $this->transaction->save();
        $this->dispatch('alertNotif', 'Order set to Complete');
    }

    public function render()
    {
        $this->transaction = Transaction::where([
            'user_id' => Auth::id(),
            'status' => 'In Transit',
        ])
            // ->whereDate('intransit_at', '>', Carbon::now()->subDays(7))
            ->orderBy('intransit_at')
            ->skip($this->transactionCount)->first();

        if ($this->transaction && $this->showOverlay && !session()->has('orderNotifStop')) {
            $this->showOverlay = true;
            $this->findDetails();
        } else {
            $this->showOverlay = false;
            session(['orderNotifStop' => true]);
        }
        return view('livewire.main.user.livewire.order-notification');
    }
}
