<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;

class InventoryCategories extends Component
{

    public function hideCategoriesWindow()
    {
        $this->dispatch('setCategoriesWindow', visibility: false);
    }
    public function render()
    {
        return view('livewire.main.admin.livewire.inventory-categories');
    }
}
