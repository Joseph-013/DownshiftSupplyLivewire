<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CompleteTransaction extends Component
{
    public function render()
    {
        return view('livewire.main.user.livewire.complete-transaction');
    }

    #[On('checkout')]
    public function checkout()
    {
        $this->dispatch('alertNotif', ['message' => 'Successfully checked out', 'type' => 'positive']);
    }

    #[On('renderAlert')]
    public function renderAlert()
    {
        $this->dispatch('alertNotif', ['message' => 'Uploaded proof is greater than 5 MB', 'type' => 'negative']);
    }
}
