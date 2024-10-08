<?php

namespace App\Livewire\Main\Admin\Livewire\ComponentsDashboard;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Lowstock extends Component
{
    use WithPagination;
    public $title = "Low Stock Products";
    public $colorMain = "rgb(242, 123, 83)";
    public $icon = "
    <span class='text-5xl -mr-2 block'>!</span>
    <svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='currentColor' class='bi bi-box-seam-fill'
    viewBox='0 0 16 16'>
        <path fill-rule='evenodd'
        d='M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z' />
    </svg>
    ";

    public function render()
    {
        $items = Product::whereColumn('stockquantity', '<=', 'criticallevel')
            ->where('stockquantity', '!=', 0)
            ->paginate(10);

        return view('livewire.main.admin.livewire.components-dashboard.item-list')->with(['items' => $items]);
    }
}
