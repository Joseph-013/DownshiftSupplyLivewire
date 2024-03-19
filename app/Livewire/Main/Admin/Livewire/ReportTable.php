<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ReportTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $format;
    public $date;
    public $rowCount = 100;

    // public function mount()
    // {
    //     $this->transactions = collect([new Transaction()]);
    // }

    #[On('renderReportTable')]
    public function renderReportTable($date, $format)
    {
        // $this->date = '01/01/2020'; // Delete this on deployment
        $this->date = $date;


        $this->format = $format;
    }

    public function updateRowCount($count)
    {
        $this->rowCount = $count;
    }

    public function render()
    {
        switch ($this->format) {
            case 'daily':
                $transactions = Transaction::whereBetween('created_at', [$this->date, Carbon::now()])->orderBy('created_at')->simplePaginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F j, Y D');
                }
                break;
            case 'weekly':
                $transactions = Transaction::whereBetween('created_at', [$this->date, Carbon::now()])->orderBy('created_at')->simplePaginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F');
                }
                break;
            case 'monthly':
                $transactions = Transaction::whereBetween('created_at', [$this->date, Carbon::now()])->orderBy('created_at')->simplePaginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F Y');
                }
                break;
            case 'annual':
                $transactions = Transaction::whereBetween('created_at', [$this->date, Carbon::now()])->orderBy('created_at')->simplePaginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('Y');
                }
                break;
        }
        if (isset($transactions))
            return view('livewire.main.admin.livewire.report-table')->with(['transactions' => $transactions]);
        else
            return view('livewire.main.admin.livewire.report-table');
    }
}
