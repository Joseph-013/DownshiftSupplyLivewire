<?php

namespace App\Livewire\Main\Admin\Livewire\ComponentsDashboard;

use App\Models\Product;
use Livewire\Component;

class SalesGraph extends Component
{
    public function render()
    {
        return view('livewire.main.admin.livewire.components-dashboard.item-graph-line');
    }
}
