<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class CreateFaq extends Component
{
    public $question;
    public $answer;

    protected $rules = [
        'question' => 'required|string',
        'answer' => 'required|string',
    ];
    
    public function render()
    {
        return view('livewire.create-faq');
    }

    public function createFaq()
    {
        if($this->question && $this->answer) {
            $newFaq = FAQ::create([
                'question' => $this->question,
                'answer' => $this->answer,
            ]);
            $this->question = null;
            $this->answer = null;
            $this->dispatch('faqCreated', $newFaq->id);
        }
    }
}
