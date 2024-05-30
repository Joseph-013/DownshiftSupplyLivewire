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

    public $sortBy = 'created_at';
    public $sortOrder = "desc";
    public $filterColumn;

    public function sort($by)
    {
        //parse to DB column
        switch ($by) {
            case 'date': {
                    $by = 'created_at';
                    break;
                }
            case 'total': {
                    $by = 'grandTotal';
                    break;
                }
        }


        if ($this->sortBy === $by) {
            $this->sortOrder = $this->sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $by;
            // dedicated initial order of column
            if ($by === 'created_at')
                $this->sortOrder = 'desc';
            else
                $this->sortOrder = 'asc';
        }
    }

    public function filter($details)
    {

        switch ($details[0]) {
            case 'Status': {
                    $details[0] = 'status';
                    break;
                }
            case 'Mode': {
                    $details[0] = 'preferredService';
                    break;
                }
        }

        $this->filterColumn = $details;
    }

    #[On('UserOrdersListRender')]
    public function render()
    {
        if (isset($this->filterColumn) && $this->filterColumn[1] !== 'All') {
            $transactionList = Transaction::where([
                'user_id' => Auth::id(),
                'purchaseType' => 'Online',
            ])
                ->orderBy($this->sortBy, $this->sortOrder)
                ->where($this->filterColumn[0], $this->filterColumn[1])
                ->paginate(10);
        } else {
            $transactionList = Transaction::where([
                'user_id' => Auth::id(),
                'purchaseType' => 'Online',
            ])
                ->orderBy($this->sortBy, $this->sortOrder)
                ->paginate(10);
        }

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
