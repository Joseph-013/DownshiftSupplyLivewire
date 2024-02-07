<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class CreateFaq extends Component
{
    public $newQuestion;
    public $newAnswer;
    
    public function render()
    {
        return view('livewire.create-faq');
    }

    public function createFaq()
    {
        $newFaq = FAQ::create([
            'question' => $this->newQuestion,
            'answer' => $this->newAnswer,
        ]);

        $this->newQuestion = null;
        $this->newAnswer = null;
        $this->dispatch('faqCreated', $newFaq->id);
    }

}
