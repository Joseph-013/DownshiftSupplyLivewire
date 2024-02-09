<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqList extends Component
{
    public $selectedFaqId;

    protected $listeners = ['faqDeleted', 'faqCreated'];

    public function render()
    {
        $faqs = FAQ::all();
        return view('livewire.main.admin.livewire.faq-list', compact('faqs'));
    }   

    public function faqDeleted($faqId)
    {
        FAQ::find($faqId)->delete();
        $this->render();
    }

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
