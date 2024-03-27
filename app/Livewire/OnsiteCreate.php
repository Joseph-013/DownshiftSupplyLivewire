<?php

namespace App\Livewire;

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

    public function mount($transaction, $mode)
    {
        $this->mode = $mode;

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
        ]);

        if ($this->firstName && $this->lastName && $this->contact) {
            Transaction::create([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'contact' => $this->contact,
            ]);

            $this->dispatch('alertNotif', 'Transaction successfully created');
            $this->dispatch('hideItemTemplate');
        }
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
            $currentTrans->firstName = $this->firstName;
            $currentTrans->lastName = $this->lastName;
            $currentTrans->contact = $this->contact;
            $currentTrans->save();

            $this->dispatch('alertNotif', 'Transaction successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderTransactionDetails');
        }
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }
}
