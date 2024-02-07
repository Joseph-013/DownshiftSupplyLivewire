<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqList extends Component
{
    public $showDeleteAlert = false;

    public $selectedFaqId;

    protected $listeners = ['faqDeleted', 'faqCreated'];

    public function render()
    {
        $faqs = FAQ::all();
        return view('livewire.faq-list', compact('faqs'));
    }   

    public function faqDeleted($faqId)
    {
        FAQ::find($faqId)->delete();
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
