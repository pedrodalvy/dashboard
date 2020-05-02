<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SendMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @param Request $email
     */
    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('resume.email.message')
            ->from($this->email->email)
            ->subject($this->email->subject)
            ->with('email', $this->email);
    }
}
