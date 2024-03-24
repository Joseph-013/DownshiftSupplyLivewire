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
    public $itemTemplateToggleRes;

    #[On('renderFaqList')]
    public function render()
    {
        $faqs = FAQ::paginate(10);
        return view('livewire.main.admin.livewire.faq-list')->with(['faqs' => $faqs]);
    }

    public function selectFaq($faqId)
    {
        $this->selectedFaqId = $faqId;
        $this->dispatch('faqSelected', $faqId);
        $this->toggleItemTemplate($faqId);
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
        $this->itemTemplateToggleRes = null;
    }

    #[On('toggleItemTemplate')]
    public function toggleItemTemplate($value)
    {
        if ($value == null) {
            $this->itemTemplateToggleRes = null;
        } elseif ($value == false) {
            $this->itemTemplateToggleRes = false;
        } else {
            $this->itemTemplateToggleRes = $value;
        }
    }
}
