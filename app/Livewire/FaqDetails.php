<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqDetails extends Component
{
    public $selectedFaq;

    protected $listeners = ['faqSelected'];

    public function mount()
    {
        $this->selectedFaq = null;
    }

    public function faqSelected($faqId)
    {
        $this->selectedFaq = FAQ::find($faqId);
    }

    public function render()
    {
        return view('livewire.faq-details');
    }
}
