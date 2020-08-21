<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $password;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password,$email){
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from('hello@thefoxmedia.in', 'The Fox Media')
                    ->subject('Password for your account')
                    ->markdown('mails.password_template')
                    ->with(['password'=> $this->password,'email'=>$this->email]);
    }
}
