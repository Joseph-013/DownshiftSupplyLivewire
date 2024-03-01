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

    public function mount()
    {
        $this->question = null;
        $this->answer = null;
    }

    public function render()
    {
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
            $this->dispatch('faqCreated');
        }
    }

    public function hideSuccessMessage()
    {
        session()->forget('success-message');
    }
}
