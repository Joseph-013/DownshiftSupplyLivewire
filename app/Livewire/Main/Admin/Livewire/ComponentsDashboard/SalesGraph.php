<?php

namespace App\Livewire\Main\Admin\Livewire\ComponentsDashboard;

// use App\Models\Product;
use App\Models\Detail;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;


class SalesGraph extends Component
{
    use WithPagination;
    public $title = "Daily Sales Graph";
    public $subTitle = "(This Month)";
    public $colorMain = "rgb(30, 174, 144)";
    // public $colorMain = "rgb(226 232 240)";
    public $icon = "
    <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' fill='currentColor' class='bi bi-graph-up' viewBox='0 0 16 16'>
    <path fill-rule='evenodd' d='M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07'/>
    </svg>
    ";
    // public $data;

    public function render()
    {
        $currentMonth = now()->month; // Get the current month
        $currentYear = now()->year; // Get the current year

        $data = Detail::select(
            DB::raw("DAY(created_at) as day_number"),
            DB::raw('SUM(subtotal) as total_subtotal')
        )
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->groupBy('day_number')
            ->orderBy('day_number')
            ->get();

        // dd($data);
        return view('livewire.main.admin.livewire.components-dashboard.item-graph-line')->with(['data' => $data]);
    }
}
