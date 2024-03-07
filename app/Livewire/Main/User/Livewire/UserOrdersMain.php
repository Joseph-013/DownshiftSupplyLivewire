<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class UserOrdersMain extends Component
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
        return view('livewire.main.user.livewire.user-orders-main');
    }
}
