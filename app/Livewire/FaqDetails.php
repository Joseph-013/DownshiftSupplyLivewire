<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;

class FaqDetails extends Component
{
    public $selectedFaq = null;
    public $newQuestion = null;
    public $newAnswer = null;

    #[On('faqSelected')]
    public function faqSelected($faqId)
    {
        $this->selectedFaq = FAQ::find($faqId);
        if ($this->selectedFaq) {
            $this->newQuestion = $this->selectedFaq->question;
            $this->newAnswer = $this->selectedFaq->answer;
        }
    }

    public function deleteFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->delete();
            $this->selectedFaq = null;
            session()->flash('success-message', 'FAQ entry deleted successfully.');
            $this->dispatch('faqDeleted');
        }
    }

    public function updateFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->question = $this->newQuestion;
            $this->selectedFaq->answer = $this->newAnswer;
            $this->selectedFaq->save();
            session()->flash('success-message', 'FAQ entry updated successfully.');
            $this->dispatch('faqCreated');
        }
    }

    #[On('faqDeleted', 'faqCreated')]
    public function render()
    {
        if (!$this->selectedFaq) {
            $this->newQuestion = null;
            $this->newAnswer = null;
        }
        return view('livewire.main.admin.livewire.faq-details');
    }

    public function hideSuccessMessage()
    {
        session()->forget('success-message');
    }
}
