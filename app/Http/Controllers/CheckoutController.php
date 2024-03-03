<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CheckoutController extends Controller
{
    use WithFileUploads;

    public function submit(Request $request)
    {
        // dd($request->input('firstName'), $request->input('lastName'),
        // $request->input('contact'), $request->input('preferredService'), 
        // $request->input('paymentOption'), $request->input('proofOfPayment'),
        // $request->input('shippingAddress'));
        // $validatedData = $request->validate([
        //     'firstName' => 'required|string|max:255',
        //     'lastName' => 'required|string|max:255',
        //     'contact' => 'required|string|max:11',
        //     'preferredService' => 'required|in:Pickup,Delivery',
        //     'paymentOption' => 'required|string|max:255',
        //     'proofOfPayment' => 'required|file|mimes:jpg,png|max:4096',
        //     'shippingAddress' => 'required|string|max:255',
        // ]);

        $proofOfPayment = $request->file('proofOfPayment');
        $proofFileName = time() . 'Proof.' . $proofOfPayment->extension();
        $proofOfPayment->storeAs('public/assets', $proofFileName);

        $transaction = new Transaction();
        $transaction->firstName = $request->input('firstName');
        $transaction->lastName = $request->input('lastName');
        $transaction->contact = $request->input('contact');
        $transaction->purchaseType = 'Online';
        $transaction->user_id = Auth::id();
        $transaction->status = 'Processing';
        $transaction->preferredService = $request->input('preferredService');
        if ($request->input('preferredService') === 'Delivery') {
            $transaction->shippingAddress = $request->input('shippingAddress');
        }
        $transaction->paymentOption = $request->input('paymentOption');
        $transaction->proofOfPayment = $proofFileName;
        
        $transaction->save();
    }
}
