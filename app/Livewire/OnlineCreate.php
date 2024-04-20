<?php

namespace App\Livewire;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class OnlineCreate extends Component
{
    public $mode = 'read';

    public $transaction;
    public $id;
    public $date;
    public $image;
    public $firstName;
    public $lastName;
    public $contact;
    public $paymentOption;
    public $preferredService;
    public $statusOptions;
    public $preferredServiceOptions;
    public $courierUsed;
    public $shippingFee;
    public $previousShippingFee;
    public $trackingNumber;
    public $shippingAddress;
    public $status;
    public $previousStatus;
    public $total;

    public $details;

    public function mount($transaction, $mode)
    {
        $this->mode = $mode;

        // $this->transaction = Transaction::find($transaction)->with('details');
        $this->transaction = Transaction::find($transaction);
        $this->details = Detail::where('transaction_id', $this->transaction->id)->with('products')->get();

        if ($this->transaction) {
            $this->id = $this->transaction->id;
            $this->date = Carbon::parse($this->transaction->created_at)->format('m-d-Y h:i:s A');
            $this->firstName = $this->transaction->firstName;
            $this->lastName = $this->transaction->lastName;
            $this->contact = $this->transaction->contact;
            $this->paymentOption = $this->transaction->paymentOption;
            $this->preferredService = $this->transaction->preferredService;
            $this->courierUsed = $this->transaction->courierUsed;
            $this->shippingFee = $this->transaction->shippingFee;
            $this->previousShippingFee = $this->transaction->shippingFee;
            $this->trackingNumber = $this->transaction->trackingNumber;
            $this->shippingAddress = $this->transaction->shippingAddress;
            $this->status = $this->transaction->status;
            $this->previousStatus = $this->transaction->status;
            $this->image = $this->transaction->proofOfPayment;
            $this->total = $this->transaction->grandTotal;
        } else {
            $this->mode = 'write';
            $this->courierUsed = null;
            $this->shippingFee = null;
            $this->trackingNumber = null;
            $this->shippingAddress = null;
            $this->status = null;
        }

        $this->preferredServiceOptions = $this->getEnumValues('transactions', 'preferredService');
        $this->statusOptions = $this->getEnumValues('transactions', 'status');
    }

    public function render()
    {
        return view('livewire.online-create');
    }

    public function editTrans()
    {
        $currentTrans = $this->transaction;
        $this->validate([
            'status' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:1,11'],
        ], [
            'contact.digits_between' => 'Must be between 1 and 11 digits.'
        ]);

        if ($this->status) {
            $currentTrans->firstName = $this->firstName;
            $currentTrans->lastName = $this->lastName;
            $currentTrans->contact = $this->contact;
            $currentTrans->preferredService = $this->preferredService;
            $currentTrans->courierUsed = $this->courierUsed;
            $currentTrans->trackingNumber = $this->trackingNumber;
            $currentTrans->shippingAddress = $this->shippingAddress;
            if ($this->shippingFee) {
                $currentTrans->shippingFee = $this->shippingFee;
                if($this->shippingFee != $this->previousShippingFee)
                {
                    $difference = $this->previousShippingFee - $this->shippingFee;
                    $currentTrans->grandTotal -= $difference;
                }
            } else {
                $currentTrans->shippingFee = null;
                $currentTrans->grandTotal -= $this->previousShippingFee;
            }
            
            if ($this->previousStatus != 'In Transit' && $this->status === 'In Transit')
            {
                $currentTrans->status = $this->status;
                $currentTrans->intransit_at = Carbon::now();
                $currentTrans->save();
            }
            elseif ($this->previousStatus === 'In Transit' && $this->status !== 'In Transit')
            {
                $currentTrans->status = $this->status;
                $currentTrans->intransit_at = null;
                $currentTrans->save();
            }

            if ($currentTrans->details && $this->previousStatus != 'Complete' && $this->status === 'Complete') {
                foreach ($currentTrans->details as $detail) {
                    $product = Product::findOrFail($detail->product_id);
                    $product->stockquantity -= $detail->quantity;
                    $product->save();
                }
            } elseif ($currentTrans->details && $this->previousStatus === 'Complete' && $this->status != 'Complete') {
                foreach ($currentTrans->details as $detail) {
                    $product = Product::findOrFail($detail->product_id);
                    $product->stockquantity += $detail->quantity;
                    $product->save();
                }
            }

            $currentTrans->status = $this->status;
            $currentTrans->save();

            $this->dispatch('alertNotif', 'Transaction successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
            $this->dispatch('updateBadge');
        }
    }

    public function modifyTrans()
    {
        $this->mode = 'write';
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    public function getEnumValues($table, $column)
    {
        $columnInfo = DB::select("SHOW COLUMNS FROM $table WHERE Field = ?", [$column])[0]->Type;
        preg_match('/^enum\((.*)\)$/', $columnInfo, $matches);
        $statuses = explode(',', str_replace("'", '', $matches[1]));


        $filteredStatuses = array_filter($statuses, function ($status) {
            $conditions = [
                'Delivery' => ['Ready for Pickup'],
                'Pickup' => ['In Transit']
            ];

            $preferredService = $this->preferredService ?? null;
            if ($preferredService === 'Delivery' && in_array($status, $conditions['Delivery'])) {
                return false;
            }
            if ($preferredService === 'Pickup' && in_array($status, $conditions['Pickup'])) {
                return false;
            }

            return true;
        });

        return $filteredStatuses;
    }

    public function updatePreferredService()
    {
        $this->preferredService = $this->preferredService;
    }
}
