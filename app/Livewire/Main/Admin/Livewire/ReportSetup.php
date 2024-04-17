<?php

namespace App\Livewire\Main\Admin\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class ReportSetup extends Component
{
    // public $year;
    public $startDate;
    public $endDate;
    public $startYear;
    public $endYear;
    public $format;
    // public $currentYear;

    public function changeDateSelector($format)
    {
        if ($format == 'annual') {
            $this->startDate;
            $this->endDate;
            $this->render();
        }
        // dump($format);
    }

    public function mount()
    {
        $this->startYear = $this->endYear = (int) Carbon::now()->year;
    }
    // Objectives
    // set all start to now()

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
        // dd('Start Date should be later than End Date');
        session()->flash('reportSetupError', (string) $message);
    }
}
