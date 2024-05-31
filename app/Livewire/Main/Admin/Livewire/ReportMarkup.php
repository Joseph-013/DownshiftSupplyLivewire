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
        return view('livewire.main.admin.livewire.report-markup')->with([
            'transactions' => $this->transactions,
            'format' => $this->format,
        ]);
    }
}
