<?php

namespace App\Livewire;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use Livewire\Component;

class OnsiteCreate extends Component
{
    public $mode = 'read';

    public $id;
    public $transaction;
    public $firstName;
    public $lastName;
    public $contact;
    public $details;
    public $products;
    public $search;
    public $searchResults;
    public $tempDetails;
    public $detailsToRemove;
    public $quantity;
    public $quantities = [];
    public $subtotals = [];

    public $findItemTemp;
    public $productTemp = null;

    public function mount($transaction, $mode)
    {
        $this->mode = $mode;
        $this->findItemTemp = false;
        $this->products = Product::where('name', 'like', '%' . $this->searchResults . '%')->get();

        $this->transaction = Transaction::find($transaction);
        if ($this->transaction) {
            $this->id = $this->transaction->id;
            $this->firstName = $this->transaction->firstName;
            $this->lastName = $this->transaction->lastName;
            $this->contact = $this->transaction->contact;
            $this->details = $this->transaction->details;
            foreach ($this->details as $detail) {
                $this->quantities[$detail->id] = $detail->quantity;
                $this->subtotals[$detail->id] = $detail->subtotal;
            }
        } else {
            $this->mode = 'write';
            $this->firstName = null;
            $this->lastName = null;
            $this->contact = null;
            $this->details = null;
        }

        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.onsite-create');
    }

    public function createTrans()
    {
        $grandTotal = 0;
        $this->validate([
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:1,11'],
            'tempDetails' => ['required', 'array', 'min:1'],
        ]);

        if ($this->firstName && $this->lastName && $this->contact && $this->tempDetails) {
            $newTransaction = Transaction::create([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'contact' => $this->contact,
                'purchaseType' => 'Onsite',
            ]);

            foreach ($this->tempDetails as $detail) {
                $newDetail = Detail::create([
                    'transaction_id' => $newTransaction->id,
                    'product_id' => $detail['id'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
                $product = Product::findOrFail($detail['id']);
                $product->stockquantity -= $newDetail->quantity;
                $product->save();
                $grandTotal += $newDetail->subtotal;
            }

            $newTransaction->grandTotal = $grandTotal;
            $newTransaction->save();

            $this->dispatch('alertNotif', ['message' => 'Transaction successfully created', 'type' => 'positive']);
            $this->dispatch('hideItemTemplate');
            $this->tempDetails = [];
            $this->quantities = [];
            $this->subtotals = [];
            $this->dispatch('renderTransactionDetails');
            $this->dispatch('renderTransactionList');
        }
    }

    public function modifyTrans()
    {
        $this->mode = "write";
    }

    public function editTrans()
    {
        $currentTrans = $this->transaction;
        $grandTotal = 0;
        $this->validate([
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:1,11'],
            'tempDetails.*.quantity' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
            'quantities.*' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
        ], [
            'contact.digits_between' => 'The contact number must be between 1 and 11 digits.',
            'tempDetails.*.quantity.required' => 'The quantity field of newly added items is required.',
            'tempDetails.*.quantity.numeric' => 'The quantity of newly added items must be a number.',
            'tempDetails.*.quantity.integer' => 'The quantity of newly added items must be an integer.',
            'tempDetails.*.quantity.gt' => 'The quantity of newly added items must be greater than 0.',
            'tempDetails.*.quantity.min' => 'The quantity of newly added items must be at least 1.',
            'quantities.*.required' => 'The quantity field of existing details is required.',
            'quantities.*.numeric' => 'The quantity of existing details must be a number.',
            'quantities.*.integer' => 'The quantity of existing details must be an integer.',
            'quantities.*.gt' => 'The quantity of existing details must be greater than 0.',
            'quantities.*.min' => 'The quantity of existing details must be at least 1.',
        ]);

        if ($this->firstName && $this->lastName && $this->contact) {
            if (!empty($this->tempDetails)) {
                foreach ($this->tempDetails as $tempDetail) {
                    $product = Product::findOrFail($tempDetail['id']);
                    $newDetail = new Detail();
                    $newDetail->transaction_id = $currentTrans->id;
                    $newDetail->product_id = $tempDetail['id'];
                    $newDetail->quantity = $tempDetail['quantity'];
                    $newDetail->subtotal = $tempDetail['subtotal'];
                    $product->stockquantity -= $tempDetail['quantity'];
                    $grandTotal += $tempDetail['subtotal'];
                    $newDetail->save();
                    $product->save();
                }
            }

            if (!empty($this->detailsToRemove)) {
                foreach ($this->detailsToRemove as $detailsToRemove)
                {
                    $detail = Detail::findOrFail($detailsToRemove);
                    $product = Product::findOrFail($detail->product_id);
                    $product->stockquantity += $detail->quantity;
                    $product->save();
                    Detail::destroy($detailsToRemove);
                }
            }

            $currentTrans->firstName = $this->firstName;
            $currentTrans->lastName = $this->lastName;
            $currentTrans->contact = $this->contact;

            foreach ($this->details as $detail) {
                $product = Product::findOrFail($detail->product_id);
                $previousQuantity = $detail->quantity;
                $detail->update([
                    'quantity' => $this->quantities[$detail->id] ?? 0,
                    'subtotal' => $this->subtotals[$detail->id] ?? 0,
                ]);
                $product->stockquantity += $previousQuantity - $detail->quantity;
                $product->save();
                $grandTotal += $detail->subtotal;
            }
            $currentTrans->grandTotal = $grandTotal;
            $currentTrans->save();

            $this->dispatch('alertNotif', ['message' => 'Transaction successfully updated', 'type' => 'positive']);
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
            $this->dispatch('renderTransactionList');
            $this->detailsToRemove = [];
            $this->tempDetails = [];
            $this->quantities = [];
        }
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    public function findItemTemplate()
    {
        $this->validate([
            'quantity' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
        ], [
            'quantity.required' => 'The quantity field is required.',
            'quantity.numeric' => 'The quantity must be a number.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.gt' => 'The quantity must be greater than 0.',
            'quantity.min' => 'The quantity must be at least 1.',
        ]);
        $this->findItemTemp = true;
    }

    public function submitSearch()
    {
        $this->searchResults = $this->search;
        $this->searchRender();
    }

    public function hideItemFindList()
    {
        $this->findItemTemp = false;
        $this->clearSearch();
    }

    public function clearSearch()
    {
        $this->searchResults = '';
        $this->search = '';
        $this->searchRender();
    }

    public function searchRender()
    {
        $this->products = Product::where('name', 'like', '%' . $this->searchResults . '%')->get();
    }

    public function addItem($productId)
    {
        $this->validate([
            'quantity' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
        ], [
            'quantity.required' => 'The quantity field is required.',
            'quantity.numeric' => 'The quantity must be a number.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.gt' => 'The quantity must be greater than 0.',
            'quantity.min' => 'The quantity must be at least 1.',
        ]);
        $product = Product::find($productId);

        if ($product) {
            $transactionDetails = Detail::where('transaction_id', $this->id)->get();
            $existingItem = $transactionDetails->firstWhere('product_id', $productId);
            $existingItemIndex = $this->findExistingItemIndex($productId);

            if ($existingItem || $existingItemIndex !== null) {
                $this->dispatch('alertNotif', 'Product already exists in the list');
            } else {
                $this->tempDetails[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $this->quantity,
                    'subtotal' => $product->price * $this->quantity,
                    'image' => $product->product_images->first()->image
                ];
            }
        }
        $this->hideItemFindList();
    }

    public function findExistingItemIndex($productId)
    {
        if ($this->tempDetails) {
            foreach ($this->tempDetails as $index => $item) {
                if ($item['id'] == $productId) {
                    return $index;
                }
            }
        }
        return null;
    }

    public function removeItem($detailId)
    {
        foreach ($this->tempDetails as $index => $item) {
            if ($item['id'] == $detailId) {
                unset($this->tempDetails[$index]);
                break;
            }
        }
    }

    public function removeDetail($detailId)
    {
        $index = $this->details->search(function ($detail) use ($detailId) {
            return $detail->id == $detailId;
        });

        if ($index !== false) {
            if ($this->mode == 'write') {
                $this->detailsToRemove[] = $detailId;
            }

            $this->details->forget($index);
        }
    }

    public function updateQuantity($productId, $newQuantity)
    {
        $this->validate([
            'tempDetails.*.quantity' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
        ], [
            'tempDetails.*.quantity.required' => 'The quantity field of newly added items is required.',
            'tempDetails.*.quantity.numeric' => 'The quantity of newly added items must be a number.',
            'tempDetails.*.quantity.integer' => 'The quantity of newly added items must be an integer.',
            'tempDetails.*.quantity.gt' => 'The quantity of newly added items must be greater than 0.',
            'tempDetails.*.quantity.min' => 'The quantity of newly added items must be at least 1.',
        ]);

        foreach ($this->tempDetails as &$tempDetail) {
            if ($tempDetail['id'] == $productId) {
                $tempDetail['quantity'] = $newQuantity;
                $product = Product::find($tempDetail['id']);
                if ($product) {
                    $tempDetail['subtotal'] = $product->price * $newQuantity;
                }
                break;
            }
        }
    }

    public function updateExistingQuantity($productId, $newQuantity)
    {
        $this->validate([
            'quantities.*' => ['required', 'numeric', 'integer', 'gt:0', 'min:1'],
        ], [
            'quantities.*.required' => 'The quantity field of existing details is required.',
            'quantities.*.numeric' => 'The quantity of existing details must be a number.',
            'quantities.*.integer' => 'The quantity of existing details must be an integer.',
            'quantities.*.gt' => 'The quantity of existing details must be greater than 0.',
            'quantities.*.min' => 'The quantity of existing details must be at least 1.',
        ]);

        foreach ($this->details as $detail) {
            if ($detail->id == $productId) {
                $this->quantities[$detail->id] = $newQuantity;
                $product = Product::find($detail->products->id);
                if ($product) {
                    $detail->subtotal = $product->price * $newQuantity;
                    $this->subtotals[$detail->id] = $detail->subtotal;
                }
                break;
            }
        }
    }
}
