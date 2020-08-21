<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;

    public function __construct($email){
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from('hello@thefoxmedia.in', 'The Fox Media')
                    ->subject('Strategy form link')
                    ->markdown('mails.text_template')
                    ->with('email', $this->email);
                    // ->view('mails.html_template');
    }
}
