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
        } else {
            $this->mode = 'write';
            $this->firstName = null;
            $this->lastName = null;
            $this->contact = null;
            $this->details = null;
        }
    }

    public function render()
    {
        return view('livewire.onsite-create');
    }

    public function createTrans()
    {
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
                Detail::create([
                    'transaction_id' => $newTransaction->id,
                    'product_id' => $detail['id'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            $this->dispatch('alertNotif', 'Transaction successfully created');
            $this->dispatch('hideItemTemplate');
            $this->tempDetails = [];
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
        $this->validate([
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:1,11'],
        ]);

        if ($this->firstName && $this->lastName && $this->contact) {
            if (!empty($this->tempDetails)) {
                foreach ($this->tempDetails as $tempDetail) {
                    $newDetail = new Detail();
                    $newDetail->transaction_id = $currentTrans->id;
                    $newDetail->product_id = $tempDetail['id'];
                    $newDetail->quantity = $tempDetail['quantity'];
                    $newDetail->subtotal = $tempDetail['subtotal'];
                    $newDetail->save();
                }
            }

            if (!empty($this->detailsToRemove)) {
                foreach($this->detailsToRemove as $detailsToRemove)
                    Detail::destroy($detailsToRemove);
            }

            $currentTrans->firstName = $this->firstName;
            $currentTrans->lastName = $this->lastName;
            $currentTrans->contact = $this->contact;
            $currentTrans->save();

            foreach ($this->details as $detail) {
                $detail->update([
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            $this->detailsToRemove = [];
            $this->dispatch('alertNotif', 'Transaction successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
            $this->dispatch('renderTransactionList');
        }
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    public function findItemTemplate()
    {
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
        $product = Product::find($productId);
        if ($product) {
            $existingItemIndex = $this->findExistingItemIndex($productId);
            if ($existingItemIndex !== null) {
                $this->tempDetails[$existingItemIndex]['quantity']++;
                $this->tempDetails[$existingItemIndex]['subtotal'] += $product->price;
            } else {
                $this->tempDetails[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'subtotal' => $product->price,
                    'image' => $product->image
                ];
            }
        }
        $this->hideItemFindList();
    }

    public function findExistingItemIndex($productId)
    {
        if($this->tempDetails)
        {
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
}
