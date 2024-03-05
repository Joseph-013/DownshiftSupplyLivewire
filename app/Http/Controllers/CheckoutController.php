<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CheckoutController extends Controller
{
    use WithFileUploads;

    public function index()
    {
        return view('livewire.main.user.checkout');
    }

    public function submit(Request $request)
    {
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

        $cartItems = Cart::where('user_id', Auth::id())->get();
        $grandTotal = 0;
        foreach ($cartItems as $item) {
            $detail = new Detail();
            $detail->transaction_id = $transaction->id;
            $detail->product_id = $item->product_id;
            $detail->quantity = $item->quantity;
            $detail->subtotal = $item->product->price * $item->quantity;
            $detail->save();
            $grandTotal += $detail->subtotal;
        }

        $transaction->grandTotal = $grandTotal;
        $transaction->save();

        Cart::where('user_id', Auth::id())->delete();

        return Redirect::route('user.products');
    }
}
