<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use Livewire\Component;

class InventoryCreate extends Component
{
    public $product = null;

    public function mount($product)
    {
        $this->product = $product;
    }

    // public function hideItemTemplate()
    // {
    //     dump('test');
    //     $this->dispatch('hideItemTemplate');
    // }

    public function render()
    {
        return view('livewire.main.admin.livewire.inventory-create');
    }
}
