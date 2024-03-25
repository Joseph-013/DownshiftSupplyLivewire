<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class OnlineTransactionDetails extends Component
{
    public $selectedTransaction;
    public $confirmDelete;
    public $details;
    // public $courierUsed;
    // public $shippingFee;
    // public $trackingNumber;
    // public $shippingAddress;
    // public $status;
    // public $statusOptions;
    // public $previousStatus;
    // public $transactions;
    // public $details;
    // public $purchaseDate;
    // public $contact;
    // public $firstname;
    // public $lastname;
    // public $grandtotal;
    // public $paymentOption;
    // public $preferredService;
    // public $proofOfPayment;

    public function mount()
    {
        // $this->statusOptions = $this->getEnumValues('transactions', 'status');
        // if ($transaction != 0) {
        //     $this->selectedTransaction = $transaction;
        // }
        $this->selectedTransaction = null;
        $this->confirmDelete = false;
    }

    // public function getEnumValues($table, $column)
    // {
    //     $columnInfo = DB::select("SHOW COLUMNS FROM $table WHERE Field = ?", [$column])[0]->Type;
    //     preg_match('/^enum\((.*)\)$/', $columnInfo, $matches);
    //     return explode(',', str_replace("'", '', $matches[1]));
    // }

    #[On('transactionSelected')]
    public function transactionSelected($transactionId)
    {
        // $this->transactions = Transaction::with('details')->find($transactionId);
        // if($this->transactions) {
        //     $this->selectedTransaction = $transactionId;
        //     $this->details = $this->transactions->details;
        //     $this->purchaseDate = $this->transactions->created_at;
        //     $this->contact = $this->transactions->contact;
        //     $this->firstname = $this->transactions->firstName;
        //     $this->lastname = $this->transactions->lastName;
        //     $this->paymentOption = $this->transactions->paymentOption;
        //     $this->preferredService = $this->transactions->preferredService;
        //     $this->grandtotal = $this->transactions->grandTotal;
        //     $this->courierUsed = $this->transactions->courierUsed;
        //     $this->shippingFee = $this->transactions->shippingFee;
        //     $this->trackingNumber = $this->transactions->trackingNumber;
        //     $this->shippingAddress = $this->transactions->shippingAddress;
        //     $this->proofOfPayment = $this->transactions->proofOfPayment;
        //     $this->status = $this->transactions->status;
        //     $this->previousStatus = $this->transactions->status;
        //     $this->dispatch('loadMap', $this->shippingAddress, $this->selectedTransaction);
        // }
        $this->selectedTransaction = Transaction::with('details')->find($transactionId);
        $this->details = $this->selectedTransaction->details;
        $this->dispatch('loadMap', $this->selectedTransaction->shippingAddress);
    }

    // public function updateTransaction()
    // {
    //     $this->validate([
    //         'status' => 'required',
    //     ]);

    //     $this->selectedTransaction->update([
    //         'courierUsed' => $this->courierUsed,
    //         'shippingFee' => $this->shippingFee,
    //         'trackingNumber' => $this->trackingNumber,
    //         'shippingAddress' => $this->shippingAddress,
    //         'status' => $this->status,
    //     ]);

    //     $details = $this->selectedTransaction->details;
    //     foreach ($details as $detail) {
    //         if ($this->previousStatus != "Complete" && $this->status == "Complete") {
    //             $product = $detail->products;
    //             $product->stockquantity = $product->stockquantity - $detail->quantity;
    //             $product->save();
    //         } elseif ($this->previousStatus == "Complete" && $this->status != "Complete") {
    //             $product = $detail->products;
    //             $product->stockquantity = $product->stockquantity + $detail->quantity;
    //             $product->save();
    //         }
    //     }

    //     $this->dispatch('transactionUpdated');
    //     $this->dispatch('alertNotif', 'Transaction successfully updated');
    //     $this->dispatch('loadMap', $this->shippingAddress, $this->selectedTransaction->id);
    // }
    
    #[On('renderTransactionDetails')]
    public function render()
    {
        return view('livewire.main.admin.livewire.online-transaction-details');
    }

    public function modifyTrans()
    {
        $this->dispatch('useItemTemplate', transaction: $this->selectedTransaction->id);
    }
}
