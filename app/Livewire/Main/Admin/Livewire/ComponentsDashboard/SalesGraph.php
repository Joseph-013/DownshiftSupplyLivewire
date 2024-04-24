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
    public $subTitle = "(This Week)";
    // public $colorMain = "rgb(30, 174, 144)";
    public $colorMain = "rgb(226 232 240)";
    public $icon = "
    <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' fill='currentColor' class='bi bi-graph-up' viewBox='0 0 16 16'>
    <path fill-rule='evenodd' d='M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07'/>
    </svg>
    ";
    // public $data;

    public function render()
    {
        $currentWeek = Carbon::now()->weekOfYear;

        $data = Detail::select(
            DB::raw("DATE_FORMAT(created_at, '%W') as day_name"),
            DB::raw('SUM(subtotal) as total_subtotal')
        )
            ->whereRaw("WEEK(created_at) = $currentWeek")
            ->groupBy('day_name')
            ->orderByRaw("FIELD(day_name, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->get();
        return view('livewire.main.admin.livewire.components-dashboard.item-graph-line')->with(['data' => $data]);
    }
}
