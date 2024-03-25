<?php

namespace App\Livewire;

use Livewire\Component;

class SearchTransaction extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search-transaction');
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->dispatch('searchResults', $this->search);
    }

    public function submitSearch()
    {
        $this->dispatch('searchResults', $this->search);
    }
}
