<?php

namespace App\Livewire\Main\Admin\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class ReportSetup extends Component
{
    public $startDate;
    public $endDate;
    public $startYear;
    public $endYear;
    public $format;

    public function changeDateSelector($format)
    {
        if ($format == 'annual') {
            $this->startDate;
            $this->endDate;
            $this->render();
        }
    }

    public function mount()
    {
        $this->startYear = $this->endYear = (int) Carbon::now()->year;
    }

    public function submitSetup()
    {
        if ($this->format == 'annual') {
            $this->startDate = $this->startYear;
            $this->endDate = $this->endYear;
        }

        $this->dispatch('renderReportTable', startDate: $this->startDate, endDate: $this->endDate, format: $this->format);
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.report-setup');
    }

    #[On('reportSetupError')]
    public function errorSession($message)
    {
        session()->flash('reportSetupError', (string) $message);
    }
}
