<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;

class FaqList extends Component
{
    public $selectedFaqId = null;

    #[On('renderFaqList')]
    public function render()
    {
        $this->selectedFaqId = null;
        $faqs = FAQ::all();
        return view('livewire.main.admin.livewire.faq-list', compact('faqs'));
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
        $this->dispatch('alertNotif', 'FAQ entry selected');
    }
}
