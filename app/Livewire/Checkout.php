<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $firstName;
    public $lastName;
    public $contact;
    public $preferredService;
    public $paymentOption;
    public $proofOfPayment;
    public $shippingAddress;
    public $grandTotal;
    
    public function render()
    {
        return view('livewire.checkout');
    }

    public function completeTransaction()
    {
        $this->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'contact' => 'required|string|max:11',
            'preferredService' => 'required|in:Pickup,Delivery',
            'paymentOption' => 'required|string|max:255',
            'proofOfPayment' => 'required|file|mimes:jpg,png|max:4096',
            'shippingAddress' => 'required|string|max:255',
        ]);
        $proof = time() . 'Proof.' . $this->proofOfPayment->extension();
        $this->proofOfPayment->storeAs('public/assets', $proof);

        $transaction = new Transaction();
        $transaction->firstName = $this->firstName;
        $transaction->lastName = $this->lastName;
        $transaction->contact = $this->contact;
        $transaction->purchaseType = 'Online';
        $transaction->user_id = Auth::id();
        $transaction->preferredService = $this->preferredService;
        if ($this->preferredService === 'Delivery') {
            $transaction->shippingAddress = $this->shippingAddress;
        }
        $transaction->paymentOption = $this->paymentOption;
        $transaction->proofOfPayment = $proof;
        
        $transaction->save();
    }
}
