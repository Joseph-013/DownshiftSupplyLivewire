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
        $this->newQuestion = $this->selectedFaq->question;
        $this->newAnswer = $this->selectedFaq->answer;
    }

    public function deleteFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->delete();
            $this->selectedFaq = null;
            $this->dispatch('faqDeleted');
        }
    }

    public function updateFaq()
    {
        if ($this->selectedFaq) {
            $this->selectedFaq->question = $this->newQuestion;
            $this->selectedFaq->answer = $this->newAnswer;
            $this->selectedFaq->save();
            $this->dispatch('faqCreated');
        }
    }

    // #[On('hopFaqListRender')]
    // public function hopFaqListRender()
    // {
    //     $this->dispatch('faqCreated')->to(FaqList::class);
    // }

    public function render()
    {
        return view('livewire.main.admin.livewire.faq-details');
    }
}
