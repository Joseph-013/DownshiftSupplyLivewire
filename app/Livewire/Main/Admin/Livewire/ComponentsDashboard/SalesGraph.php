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
    public $colorMain = "rgb(30, 174, 144)";
    public $icon = "
    <svg xmlns='http://www.w3.org/2000/svg' width='38' height='38' fill='currentColor' class='bi bi-graph-up' viewBox='0 0 16 16'>
    <path fill-rule='evenodd' d='M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07'/>
    </svg>
    ";

    public function render()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $data = Detail::select(
            DB::raw("DAYOFWEEK(details.created_at) as day_number"),
            DB::raw('SUM(details.subtotal) as total_subtotal')
        )
            ->join('transactions', 'details.transaction_id', '=', 'transactions.id')
            ->where('transactions.status', 'Completed')
            ->whereBetween('details.created_at', [$startOfWeek, $endOfWeek])
            ->groupBy(DB::raw("DAYOFWEEK(details.created_at)"))
            ->orderBy(DB::raw("DAYOFWEEK(details.created_at)"))
            ->get();

        return view('livewire.main.admin.livewire.components-dashboard.item-graph-line')->with(['data' => $data]);
    }
}
