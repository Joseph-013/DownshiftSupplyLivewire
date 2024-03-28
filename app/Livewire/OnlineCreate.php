<?php

namespace App\Livewire;

use App\Models\Detail;
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
    public $courierUsed;
    public $shippingFee;
    public $trackingNumber;
    public $shippingAddress;
    public $status;

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
            $this->courierUsed = $this->transaction->courierUsed ?? 'Not Set';
            $this->shippingFee = $this->transaction->shippingFee ?? 'Not Set';
            $this->trackingNumber = $this->transaction->trackingNumber ?? 'Not Set';
            $this->shippingAddress = $this->transaction->shippingAddress;
            $this->status = $this->transaction->status;
            $this->image = $this->transaction->proofOfPayment;
        } else {
            $this->mode = 'write';
            $this->courierUsed = null;
            $this->shippingFee = null;
            $this->trackingNumber = null;
            $this->shippingAddress = null;
            $this->status = null;
        }

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
            'courierUsed' => ['required', 'string'],
            'shippingFee' => ['required', 'numeric', 'min:0'],
            'trackingNumber' => ['required', 'string'],
            'shippingAddress' => ['required', 'string'],
            'status' => ['required', 'string']
        ]);

        if ($this->courierUsed && $this->shippingFee && $this->trackingNumber && $this->shippingAddress && $this->status) {
            $currentTrans->courierUsed = $this->courierUsed;
            $currentTrans->shippingFee = $this->shippingFee;
            $currentTrans->trackingNumber = $this->trackingNumber;
            $currentTrans->shippingAddress = $this->shippingAddress;
            $currentTrans->status = $this->status;
            $currentTrans->save();

            $this->dispatch('alertNotif', 'Transaction successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
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

    
        $filteredStatuses = array_filter($statuses, function($status) {
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
}
