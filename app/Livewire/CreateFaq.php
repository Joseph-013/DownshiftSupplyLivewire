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
        $this->question = "";
        $this->answer = "";
        return view('livewire.main.admin.livewire.create-faq');
    }

    public function createFaq()
    {
        if ($this->question && $this->answer) {
            FAQ::create([
                'question' => $this->question,
                'answer' => $this->answer,
            ]);
            $this->question = null;
            $this->answer = null;
            session()->flash('success-message', 'FAQ entry created successfully.');
            $this->dispatch('renderFaqList');
            $this->dispatch('renderFaqDetails');
        }
    }

    public function hideSuccessMessage()
    {
        session()->forget('success-message');
    }
}
