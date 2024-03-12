<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
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
    public $previousStatus;

    public function mount()
    {
        $this->statusOptions = $this->getEnumValues('transactions', 'status');
    }

    public function getEnumValues($table, $column)
    {
        $columnInfo = DB::select("SHOW COLUMNS FROM $table WHERE Field = ?", [$column])[0]->Type;
        preg_match('/^enum\((.*)\)$/', $columnInfo, $matches);
        return explode(',', str_replace("'", '', $matches[1]));
    }

    #[On('transactionSelected')]
    public function transactionSelected($transactionId)
    {
        $this->selectedTransaction = Transaction::with('details')->find($transactionId);
        $this->courierUsed = $this->selectedTransaction->courierUsed;
        $this->shippingFee = $this->selectedTransaction->shippingFee;
        $this->trackingNumber = $this->selectedTransaction->trackingNumber;
        $this->shippingAddress = $this->selectedTransaction->shippingAddress;
        $this->status = $this->selectedTransaction->status;
        $this->previousStatus = $this->selectedTransaction->status;
        $this->dispatch('loadMap', $this->shippingAddress, $this->selectedTransaction->id);
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

        $details = $this->selectedTransaction->details;
        foreach ($details as $detail) {
            if($this->previousStatus != "Complete" && $this->status == "Complete")
            {
                $product = $detail->products;
                $product->stockquantity = $product->stockquantity - $detail->quantity;
                $product->save();
            }
            elseif($this->previousStatus == "Complete" && $this->status != "Complete")
            {
                $product = $detail->products;
                $product->stockquantity = $product->stockquantity + $detail->quantity;
                $product->save();
            }
        }

        $this->dispatch('transactionUpdated');
        $this->dispatch('alertNotif', 'Transaction successfully updated');
        $this->dispatch('loadMap', $this->shippingAddress, $this->selectedTransaction->id);
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-details');
    }
}
