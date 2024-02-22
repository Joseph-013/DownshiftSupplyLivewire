<?php

namespace App\Livewire\Main\User\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class UserFaqsEmail extends Component
{
    #[Validate('required')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $inquiry;

    public function alert()
    {
        session()->flash('test', 'testing');
    }

    public function send()
    {
        dump($this->name . $this->email . $this->inquiry);
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-faqs-email');
    }
}
