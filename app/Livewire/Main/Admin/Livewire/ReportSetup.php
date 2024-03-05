<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;

class ReportSetup extends Component
{
    public $date;
    public $format;

    public function submitSetup()
    {
        $this->dispatch('renderReportTable', date: $this->date, format: $this->format);
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.report-setup');
    }
}
