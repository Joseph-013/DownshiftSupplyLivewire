<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqList extends Component
{
    public $selectedFaqId;

    public function render()
    {
        $faqs = FAQ::all();
        return view('livewire.faq-list', compact('faqs'));
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
    }
}
