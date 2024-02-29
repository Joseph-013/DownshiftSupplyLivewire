<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;

class FaqList extends Component
{
    public $selectedFaqId;

    // protected $listeners = ['faqDeleted', 'faqCreated'];

    public function render()
    {
        $faqs = FAQ::all();
        return view('livewire.main.admin.livewire.faq-list', compact('faqs'));
    }

    #[On('faqDeleted')]
    public function faqDeleted()
    {
        $this->render();
    }

    #[On('faqCreated')]
    public function faqCreated()
    {
        $this->render();
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
    }
}
