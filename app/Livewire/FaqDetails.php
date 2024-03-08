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
    public $confirmDelete = false;
    public $confirmUpdate = false;

    #[On('faqSelected')]
    public function faqSelected($faqId)
    {
        $this->selectedFaq = FAQ::find($faqId);
        if ($this->selectedFaq) {
            $this->newQuestion = $this->selectedFaq->question;
            $this->newAnswer = $this->selectedFaq->answer;
        }
    }

    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    public function deleteFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->delete();
            $this->selectedFaq = null;
            $this->selectedFaq = null;
            $this->confirmDelete = false;
            $this->dispatch('renderFaqList');
            $this->dispatch('alertNotif', 'FAQ entry deleted');
        }
    }

    public function updateFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->question = $this->newQuestion;
            $this->selectedFaq->answer = $this->newAnswer;
            $this->selectedFaq->save();
            $this->selectedFaq = null;
            $this->confirmUpdate = false;
            $this->dispatch('renderFaqList');
            $this->dispatch('alertNotif', 'FAQ entry updated');
        }
    }

    public function updateConfirm()
    {
        $this->confirmUpdate = true;
    }

    #[On('renderFaqDetails')]
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
