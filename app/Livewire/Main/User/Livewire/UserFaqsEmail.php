<?php

namespace App\Livewire\Main\User\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Validate;

class UserFaqsEmail extends Component
{
    #[Validate('required')]
    public string $name;
    #[Validate('required|email')]
    public string $email;
    #[Validate('required')]
    public string $inquiry;

    public function send()
    {
        if (!auth()->check()) {
            return redirect()->route('user.faqs');
        }
        $go = $this->validate([
            'name' => ['required', 'string', 'max:40', 'min:3'],
            'email' => ['required', 'string', 'max:255', 'email'],
            'inquiry' => ['required', 'string', 'max:500', 'min:5'],
        ]);

        if ($go) {
            $sendStatus = Mail::send([], [], function ($message) {
                $message->to('downshiftsupply.store@gmail.com')
                    ->from($this->email)
                    ->subject('DS: Customer Inqury')
                    ->text($this->inquiry);
            });
            if ($sendStatus) {
                session()->flash('sendStatus', 'Success!');
            } else {
                session()->flash('sendStatus', 'Please try again later.');
            }
        }


        dump($this->name . $this->email . $this->inquiry);
    }

    public function render()
    {
        return view('livewire.main.user.livewire.user-faqs-email');
    }
}
