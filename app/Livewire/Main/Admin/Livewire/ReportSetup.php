<?php

namespace App\Livewire\Main\Admin\Livewire;

use Livewire\Component;

class ReportSetup extends Component
{
    public $date;
    public $format;

    public function submitSetup()
    {
        if ($this->format == 'weekly') {
            $day = (new \DateTime($this->date))->format('j');
            if ($day >= 1 && $day <= 7) {
                $day = 1;
            } elseif ($day >= 8 && $day <= 14) {
                $day = 8;
            } elseif ($day >= 15 && $day <= 21) {
                $day = 15;
            } elseif ($day >= 22) {
                $day = 22;
            }
            $parsedDate = (new \DateTime($this->date))->setDate((new \DateTime($this->date))->format('Y'), (new \DateTime($this->date))->format('m'), $day)->format('Y-m-d');
            $this->dispatch('renderReportTable', date: $parsedDate, format: $this->format);
        } else {
            $this->dispatch('renderReportTable', date: $this->date, format: $this->format);
        }
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.report-setup');
    }
}
