<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified', 'role:admin']);
    // }

    public function inventory()
    {
        return view('livewire.main.admin.inventory');
    }

    public function edittransaction($transactionId) {
        // dd('retrieved');
        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            // Transaction not found, handle accordingly (e.g., redirect or show an error view)
            return redirect()->route('admin.salestransactions')->with('error', 'Transaction not found.');
        }

        return view('livewire/main/admin/edittransactions', ['transaction' => $transaction]);
    }
}
