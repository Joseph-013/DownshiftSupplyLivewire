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

    public $inquiry = "";
    public $subject = '';

    public function render()
    {
        return view('livewire.main.user.livewire.user-faqs-email');
    }

    public function updateSubject($value)
    {
        $this->subject = $value;
        if ($value == 'return') {
            $this->inquiry = "Order Number/Id: \n\nDefective Product/s: \n\nDetails: ";
        }
    }


    public function send()
    {
        $validationStatus = $this->validate([
            'subject' => ['required', 'string', 'in:inquiry,return'],
            'inquiry' => ['required', 'string', 'max:500'],
        ]);

        $subject = '';

        if ($validationStatus) {
            switch ($this->subject) {
                case 'inquiry': {
                        $subject = 'DS: Customer Inquiry';
                        break;
                    }
                case 'return': {
                        $subject = 'DS: Item Return Request';
                        break;
                    }
            }

            try {
                Mail::to('downshiftsupply.store@gmail.com')
                    ->send(new InquiryMail(
                        Auth::user()->fullname,
                        Auth::user()->email,
                        $subject,
                        $this->inquiry
                    ));
                session()->flash('sendStatus', 'Success! Your inquiry has been sent.');
            } catch (\Exception $e) {
                session()->flash('sendStatus', 'Failed to send your inquiry. Please try again later.');
            }
        }
        // Validation
        // try {
        //     Mail::to('downshiftsupply.store@gmail.com')
        //         ->send(new InquiryMail(Auth::user()->fullname, Auth::user()->email, $this->inquiry));
        //     session()->flash('sendStatus', 'Success! Your inquiry has been sent.');
        // } catch (\Exception $e) {
        //     session()->flash('sendStatus', 'Failed to send your inquiry. Please try again later.');
        // }


    }
}
