<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class InventoryMain extends Component
{

    public $windowWidth = 9999;
    public $initialRender = true;

    #[On('windowWidthChange')]
    public function handlerWidthChange($width)
    {
        $this->windowWidth = $width;
        // dump("new width: " . $width);
    }

    public function render()
    {
        if ($this->initialRender == true) {
            $this->dispatch('initialRender', permit: $this->initialRender);
            $this->initialRender = false;
        }
        return view('livewire.main.admin.livewire.inventory-main');
    }
}
