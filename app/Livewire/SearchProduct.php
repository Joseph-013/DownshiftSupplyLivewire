<?php

namespace App\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public $search;
    public $filterStatus = 'All';

    public function filter($by)
    {
        $this->filterStatus = $by;
        $this->dispatch('filter', by: $by);
    }

    public function render()
    {
        return view('livewire.search-product');
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
