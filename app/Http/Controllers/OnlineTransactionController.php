<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OnlineTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('livewire.main.admin.online-transactions', ['transactions' => $transactions]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $transactions = Transaction::where('firstName', 'like', '%' . $search . '%')
                                    ->orWhere('lastName', 'like', '%' . $search . '%')
                                    ->orWhere('id', 'like', '%' . $search . '%')
                                    ->get();
        return view('livewire.main.admin.online-transactions', ['transactions' => $transactions]);
    }
}
