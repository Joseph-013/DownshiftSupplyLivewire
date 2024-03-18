<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class FaqList extends Component
{
    use WithPagination;

    public $selectedFaqId = null;

    #[On('renderFaqList')]
    public function render()
    {
        $this->selectedFaqId = null;
        $faqs = FAQ::paginate(10);
        return view('livewire.main.admin.livewire.faq-list', compact('faqs'));
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
        $this->dispatch('alertNotif', 'FAQ entry selected');
    }
}
