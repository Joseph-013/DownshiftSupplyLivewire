<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $inquiry;

    public function __construct($name, $email, $inquiry)
    {
        $this->name = $name;
        $this->email = $email;
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('DS: Customer Inquiry')
                    ->from($this->email)
                    ->view('emails.inquiry');
    }
}
