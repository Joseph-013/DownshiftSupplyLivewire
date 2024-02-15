<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class OnsiteTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('livewire.main.admin.onsite-transactions', ['transactions' => $transactions]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $transactions = Transaction::where('firstName', 'like', '%' . $search . '%')
                                    ->orWhere('lastName', 'like', '%' . $search . '%')
                                    ->orWhere('id', 'like', '%' . $search . '%')
                                    ->get();
        return view('livewire.main.admin.onsite-transactions', ['transactions' => $transactions]);
    }
}
