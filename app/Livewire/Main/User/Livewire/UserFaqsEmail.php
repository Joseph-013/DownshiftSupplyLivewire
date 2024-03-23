<?php

namespace App\Livewire\Main\User\Livewire;

use Exception;
use Livewire\Component;
use App\Mail\InquiryMail;
use Illuminate\Mail\Mailable;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserFaqsEmail extends Component
{

    public $inquiry = '';

    public function render()
    {
        return view('livewire.main.user.livewire.user-faqs-email');
    }

    public function send()
    {
        $this->validate([
            'inquiry' => ['required', 'string', 'max:500'],
        ]);
        // Validation
        try {
            Mail::to('downshiftsupply.store@gmail.com')
                ->send(new InquiryMail(Auth::user()->fullname, Auth::user()->email, $this->inquiry));
            session()->flash('sendStatus', 'Success! Your inquiry has been sent.');
        } catch (\Exception $e) {
            session()->flash('sendStatus', 'Failed to send your inquiry. Please try again later.');
        }
    }
}
