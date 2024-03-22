<?php

namespace App\Livewire\Main\User\Livewire;

use App\Mail\InquiryMail;
use Exception;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
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

    // public function send()
    // {
    //     if (!auth()->check()) {
    //         return redirect()->route('user.faqs');
    //     }
    //     $go = $this->validate([
    //         'name' => ['required', 'string', 'max:40', 'min:3'],
    //         'email' => ['required', 'string', 'max:255', 'email'],
    //         'inquiry' => ['required', 'string', 'max:500', 'min:5'],
    //     ]);

    //     if ($go) {
    //         $sendStatus = Mail::send([], [], function ($message) {
    //             $message->to('downshiftsupply.store@gmail.com')
    //                 ->from($this->email)
    //                 ->subject('DS: Customer Inqury')
    //                 ->text($this->inquiry);
    //         });
    //         if ($sendStatus) {
    //             session()->flash('sendStatus', 'Success!');
    //         } else {
    //             session()->flash('sendStatus', 'Please try again later.');
    //         }
    //     }


    //     dump($this->name . $this->email . $this->inquiry);
    // }
    
    public function render()
    {
        return view('livewire.main.user.livewire.user-faqs-email');
    }

    public function send()
    {
        try {
            Mail::to('valdecanasjustin@gmail.com')
                ->send(new InquiryMail($this->name, $this->email, $this->inquiry));
            session()->flash('sendStatus', 'Success! Your inquiry has been sent.');
        } catch (\Exception $e) {
            session()->flash('sendStatus', 'Failed to send your inquiry. Please try again later.');
        }
    }
}
