<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class ReportMarkup extends Component
{
    public $format;
    public $startDate;
    public $endDate;
    public $transactions;

    public function mount($data)
    {
        $this->format = $data['format'];
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
        $this->transactions = $data['transactions'];
    }

    public function render()
    {
        // switch ($this->format) {
        //     case 'daily':
        //         $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
        //         foreach ($transactions as $transaction) {
        //             $transaction->identifier = $transaction->created_at->format('F j, Y D');
        //         }
        //         break;
        //     case 'weekly':
        //         $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
        //         foreach ($transactions as $transaction) {
        //             $transaction->identifier = $transaction->created_at->format('F');
        //         }
        //         break;
        //     case 'monthly':
        //         $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
        //         foreach ($transactions as $transaction) {
        //             $transaction->identifier = $transaction->created_at->format('F Y');
        //         }
        //         break;
        //     case 'annual':
        //         $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
        //         foreach ($transactions as $transaction) {
        //             $transaction->identifier = $transaction->created_at->format('Y');
        //         }
        //         break;
        // }

        return view('livewire.main.admin.livewire.report-markup')->with([
            'transactions' => $this->transactions,
            'format' => $this->format,
        ]);

        // return view('livewire.main.admin.livewire.report-markup')->with([
        //     'format' => $this->format,
        //     'startDate' => $this->startDate,
        //     'endDate' => $this->endDate,
        // ]);
    }
}
