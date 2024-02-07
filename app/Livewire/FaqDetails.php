<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class FaqDetails extends Component
{
    public $selectedFaq;
    public $newQuestion;
    public $newAnswer;

    protected $listeners = ['faqSelected'];

    public function mount()
    {
        $this->selectedFaq = null;
    }

    public function faqSelected($faqId)
    {
        $this->selectedFaq = FAQ::find($faqId);
    }

    public function deleteFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->delete();
            $this->selectedFaq = null;
            $this->dispatch('faqDeleted');
        }
    }

    public function createFaq()
    {
        $newFaq = FAQ::create([
            'question' => $this->newQuestion,
            'answer' => $this->newAnswer,
        ]);

        $this->newQuestion = '';
        $this->newAnswer = '';

        $this->dispatch('faqCreated', $newFaq->id);
    }

    public function render()
    {
        return view('livewire.faq-details');
    }
}
