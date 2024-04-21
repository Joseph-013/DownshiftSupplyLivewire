<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;

class FaqDetails extends Component
{
    public $selectedFaq;
    public $confirmDelete;

    public function mount()
    {
        $this->selectedFaq = null;
        $this->confirmDelete = false;
    }

    #[On('faqSelected')]
    public function faqSelected($faqId)
    {
        $this->selectedFaq = FAQ::find($faqId);
    }

    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    #[On('deleteFaq')]
    public function deleteFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->delete();
            $this->selectedFaq = null;
            $this->confirmDelete = false;
            $this->dispatch('renderFaqList');
            $this->dispatch('alertNotif', ['message' => 'FAQ entry deleted', 'type' => 'positive']);
        }
    }

    #[On('renderFaqDetails')]
    public function render()
    {
        return view('livewire.main.admin.livewire.faq-details');
    }

    public function modifyFaq()
    {
        $this->dispatch('useItemTemplate', faq: $this->selectedFaq->id);
    }
}
