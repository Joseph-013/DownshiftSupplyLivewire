<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class ReportMarkup extends Component
{
    public $format;
    public $startDate;
    public $endDate;

    public function mount($data)
    {
        // Assign the passed data to the $foo property
        // $this->foo = $data['test'];
        // dd($data);

        $this->format = $data['format'];
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
    }

    public function render()
    {
        switch ($this->format) {
            case 'daily':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F j, Y D');
                }
                break;
            case 'weekly':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F');
                }
                break;
            case 'monthly':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('F Y');
                }
                break;
            case 'annual':
                $transactions = Transaction::whereBetween('created_at', [$this->startDate, $this->endDate])->orderBy('created_at')->get();
                foreach ($transactions as $transaction) {
                    $transaction->identifier = $transaction->created_at->format('Y');
                }
                break;
        }

        return view('livewire.main.admin.livewire.report-markup')->with([
            'transactions' => $transactions,
            'format' => $this->format,
        ]);

        // return view('livewire.main.admin.livewire.report-markup')->with([
        //     'format' => $this->format,
        //     'startDate' => $this->startDate,
        //     'endDate' => $this->endDate,
        // ]);
    }
}
