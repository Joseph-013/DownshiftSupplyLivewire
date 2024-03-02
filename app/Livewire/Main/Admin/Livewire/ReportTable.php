<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;

class ReportTable extends Component
{
    public $transactions;
    public $format;

    #[On('renderReportTable')]
    public function renderReportTable($date, $format)
    {
        // dump($date, $format);
        switch ($format) {
            case 'daily':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])->get();
                break;
            case 'weekly':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])
                    ->groupBy(function ($transaction) {
                        return $transaction->created_at->format('l');
                    })->get();
                break;
            case 'monthly':
                $this->transactions = Transaction::whereBetween('created_at', [
                    Carbon::parse($date)->startOfMonth(),
                    Carbon::now()
                ])->groupBy(function ($transaction) {
                    return $transaction->created_at->format('m-Y');
                })->get();
                break;
            case 'annual':
                $this->transactions = Transaction::whereBetween('created_at', [
                    Carbon::parse($date)->startOfYear(),
                    Carbon::now()
                ])->groupBy(function ($transaction) {
                    return $transaction->created_at->format('Y');
                })->get();
                break;
        }
        $this->format = $format;
        // dump('$this->transactions');
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.report-table');
    }
}
