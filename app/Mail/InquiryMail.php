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
    public $subject;
    public $inquiry;

    public function __construct($name, $email, $subject, $inquiry)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->from($this->email)
            ->view('emails.inquiry');
    }
}
