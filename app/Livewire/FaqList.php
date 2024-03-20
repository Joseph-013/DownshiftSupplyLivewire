<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class FaqList extends Component
{
    use WithPagination;

    public $selectedFaqId;
    public $itemTemplateToggle;

    #[On('renderFaqList')]
    public function render()
    {
        $this->selectedFaqId = null;
        $faqs = FAQ::paginate(10);
        return view('livewire.main.admin.livewire.faq-list')->with(['faqs' => $faqs]);
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
    }

    #[On('useItemTemplate')]
    public function itemTemplate($faq)
    {
        if ($faq == null) {
            $this->itemTemplateToggle = 0;
        }
        else {
            $this->itemTemplateToggle = $faq;
        }
    }

    #[On('hideItemTemplate')]
    public function hideItemTemplate()
    {
        $this->itemTemplateToggle = null;
    }
}
