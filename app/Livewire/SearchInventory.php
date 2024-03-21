<?php

namespace App\Livewire;

use Livewire\Component;

class SearchInventory extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-inventory');
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->dispatch('renderProductList');
    }

    public function submitSearch()
    {
        $this->dispatch('searchResults', $this->search);
    }
}
