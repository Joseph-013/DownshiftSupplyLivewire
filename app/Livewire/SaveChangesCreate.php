<?php

namespace App\Livewire;

use Livewire\Component;

class SaveChangesCreate extends Component
{
    public $productList = [];
    public $productListIsEmpty;

    public function render()
    {
        return view('livewire.save-changes-create');
        $this->productListIsEmpty = empty($this->productList);
    }
}
