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
    public $startDate;
    public $endDate;
    public $rowCount = 100;

    // public function mount()
    // {
    //     $this->renderReportTable('2023-W1', '2023-W12', 'weekly');
    // }

    #[On('renderReportTable')]
    public function renderReportTable($startDate, $endDate, $format)
    {

        $this->format = $format;
        $realFormat = "";

        switch ($format) {
            case 'daily': {
                    $realFormat = "Date";
                    $this->startDate = $startDate;
                    $this->endDate = $endDate;
                    break;
                }

            case 'weekly': {
                    $realFormat = "Week";
                    list($year1, $week1) = explode('-W', $startDate);
                    list($year2, $week2) = explode('-W', $endDate);
                    $this->startDate = Carbon::now()->setISODate($year1, $week1)->startOfWeek();
                    $this->endDate = Carbon::now()->setISODate($year2, $week2)->endOfWeek();
                    break;
                }

            case 'monthly': {
                    $realFormat = "Month";
                    list($year1, $month1) = explode('-', $startDate);
                    list($year2, $month2) = explode('-', $endDate);
                    $this->startDate = Carbon::createFromDate($year1, $month1)->startOfMonth();
                    $this->endDate = Carbon::createFromDate($year2, $month2)->endOfMonth();
                    break;
                }

            case 'annual': {
                    $realFormat = "Year";
                    $this->startDate = Carbon::createFromDate((int) $startDate, 1, 1)->startOfYear();
                    $this->endDate = Carbon::createFromDate((int) $endDate, 12, 31)->endOfYear();
                    break;
                }
        }

        if ($this->endDate < $this->startDate) {
            $this->dispatch('reportSetupError', message: 'End ' . $realFormat . " is earlier than the Start " . $realFormat);
        }
        // dd('Start Date: ' . $this->startDate . ' End Date: ' . $this->endDate);
    }

    public function updateRowCount($count)
    {
        $this->rowCount = $count;
    }

    public function render()
    {
        switch ($this->format) {
            case 'daily':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->paginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F j, Y D');
                }
                break;
            case 'weekly':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->paginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F');
                }
                break;
            case 'monthly':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->paginate($this->rowCount);
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F Y');
                }
                break;
            case 'annual':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->paginate($this->rowCount);
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
