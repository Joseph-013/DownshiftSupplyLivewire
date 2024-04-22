<?php

namespace App\Livewire\Main\Admin\Livewire\ComponentsDashboard;

use App\Models\Detail;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeastSold extends Component
{
    public $items;
    public $title = "Least Sold Items";
    public $subTitle = "(This Week)";
    public $colorMain = "rgb(237, 167, 98)";
    public $icon = "
    <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-flame' width='44' height='44' viewBox='0 0 24 24' stroke-width='1.5' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'>
    <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
    <path d='M12 12c2 -2.96 0 -7 -1 -8c0 3.038 -1.773 4.741 -3 6c-1.226 1.26 -2 3.24 -2 5a6 6 0 1 0 12 0c0 -1.532 -1.056 -3.94 -2 -5c-1.786 3 -2.791 3 -4 2z' />
    </svg>
    ";

    public function render()
    {
        $startDate = Carbon::now()->startOfWeek()->toDateString();
        $endDate = Carbon::now()->endOfWeek()->toDateString();

        // $this->items = Detail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        //     ->whereBetween('created_at', [$startDate, $endDate])
        //     ->groupBy('product_id')
        //     ->orderByDesc('total_quantity')
        //     ->limit(10)
        //     ->get();

        $this->items = Detail::select('product_id', DB::raw('SUM(quantity) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('product_id')
            ->orderBy('total', 'asc')
            ->limit(10)
            ->with('products')
            ->get();

        return view('livewire.main.admin.livewire.components-dashboard.item-list-summary');
    }
}
