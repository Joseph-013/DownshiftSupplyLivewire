<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;

class CompleteTransaction extends Component
{
    public function render()
    {
        return view('livewire.main.user.livewire.complete-transaction');
    }

    public function dispatchAlert()
    {
        $this->dispatch('alertCompleteTransaction');
    }
}
