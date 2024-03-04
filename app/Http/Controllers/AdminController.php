<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
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

    public function updateTransaction(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'productList' => 'array',
        ]);
    
        $transaction = Transaction::findOrFail($id);
    
        $transaction->update([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'contact' => $validatedData['contact'],
        ]);

        $productList = $request->input('productList', []);

        if (!empty($productList)) {
            $existingProductIds = collect($transaction->details)->pluck('product_id')->toArray();
            $updatedProductIds = $validatedData['productList'];
    
            $productsToDelete = array_diff($existingProductIds, $updatedProductIds);
    
            Detail::where('transaction_id', $transaction->id)
                ->whereIn('product_id', $productsToDelete)
                ->delete();
        
            foreach ($validatedData['productList'] as $index => $productId) {
                if (isset($request->input('quantity')[$index])) {
                    $quantity = $request->input('quantity')[$index];
            
                    $detail = Detail::where('transaction_id', $transaction->id)
                        ->where('product_id', $productId)
                        ->first();
            
                    $product = Product::findOrFail($productId);
                    $price = $product->price;
            
                    $subtotal = $quantity * $price;
            
                    if ($detail) {
                        $detail->update(['quantity' => $quantity]);
                        $detail->update(['subtotal' => $subtotal]);
                    } else {
                        Detail::create([
                            'transaction_id' => $transaction->id,
                            'product_id' => $productId,
                            'quantity' => $quantity,
                            'subtotal' => $subtotal
                        ]);
                    }
                }
            }
        }
    
        return redirect()->back();
    }

    public function createTransaction(Request $request) 
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'productList' => 'array',
        ]);

        $transaction = new Transaction();
        $transaction->firstName = $validatedData['firstName'];
        $transaction->lastName = $validatedData['lastName'];
        $transaction->contact = $validatedData['contact'];
        $transaction->save();

        $productList = $request->input('productList', []);
        if (!empty($productList)) {
            foreach ($validatedData['productList'] as $index => $productId) {
                $quantity = $request->input('quantity')[$index];
                $product = Product::findOrFail($productId);
                $price = $product->price;
                $subtotal = $quantity * $price;

                $detail = new Detail();
                $detail->transaction_id = $transaction->id;
                $detail->product_id = $productId;
                $detail->quantity = $quantity;
                $detail->subtotal = $subtotal;
                $detail->save();
            }
        }

        return redirect()->back();
    }
}
