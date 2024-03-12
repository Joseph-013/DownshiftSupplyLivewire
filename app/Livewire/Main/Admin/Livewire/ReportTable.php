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
        // $date = '01/01/2020'; // Delete this on deployment
        switch ($format) {
            case 'daily':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])->orderBy('created_at')->get();
                foreach ($this->transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F j, Y D');
                }
                break;
            case 'weekly':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])->orderBy('created_at')->get();
                foreach ($this->transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F');
                }
                break;
            case 'monthly':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])->orderBy('created_at')->get();
                foreach ($this->transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F Y');
                }
                break;
            case 'annual':
                $this->transactions = Transaction::whereBetween('created_at', [$date, Carbon::now()])->orderBy('created_at')->get();
                foreach ($this->transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('Y');
                }
                break;
        }
        if ($this->transactions->count() == 0) {
            $this->transactions = null;
        }
        $this->format = $format;
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.report-table');
    }
}
