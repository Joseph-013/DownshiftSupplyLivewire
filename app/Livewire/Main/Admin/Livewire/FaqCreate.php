<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\Attributes\On;

class FaqCreate extends Component
{
    public $mode = 'read';

    public $faq;
    public $question;
    public $answer;
    public $confirmDelete;

    public function mount($faq, $mode)
    {
        $this->faq = FAQ::find($faq);
        $this->mode = $mode;
        if ($this->faq) {
            $this->question = $this->faq->question;
            $this->answer = $this->faq->answer;
        } else {
            $this->mode = 'write';
            $this->question = null;
            $this->answer = null;
        }
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.faq-create');
    }

    public function createFaq()
    {
        $this->validate([
            'question' => ['required', 'string', 'unique:' . FAQ::class],
            'answer' => ['required', 'string'],
        ]);

        if ($this->question && $this->answer) {
            FAQ::create([
                'question' => $this->question,
                'answer' => $this->answer,
            ]);

            $this->dispatch('alertNotif', ['message' => 'FAQ entry successfully created', 'type' => 'positive']);
            $this->dispatch('hideItemTemplate');
        }
    }

    public function modifyFaq()
    {
        $this->mode = 'write';
    }

    public function editFaq()
    {
        $currentFaq = $this->faq;
        $this->validate([
            'question' => ['required', 'string'],
            'answer' => ['required', 'string'],
        ]);

        if ($this->question && $this->answer) {
            $currentFaq->question = $this->question;
            $currentFaq->answer = $this->answer;
            $currentFaq->save();

            $this->dispatch('alertNotif', ['message' => 'FAQ entry successfully updated', 'type' => 'positive']);
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderFaqDetails');
        }
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    #[On('deleteConfirm')]
    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    public function deleteFaq()
    {
        $this->dispatch('deleteFaq');
        $this->cancel();
    }
}
