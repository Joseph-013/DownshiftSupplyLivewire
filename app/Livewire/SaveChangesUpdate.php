<?php

namespace App\Livewire;

use Livewire\Component;

class SaveChangesUpdate extends Component
{
    public function render()
    {
        return view('livewire.save-changes-update');
    }

    public function showAlert()
    {
        $this->dispatch('alertNotif', 'Transaction successfully updated');
        return redirect()->route('admin.onsitetransactions');
    }
}
