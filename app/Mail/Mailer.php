<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
    }

    //Monta o e-mail sobrescrevendo a view Mailer do blade
    public function build()
    {
        $this->subject($this->user->title);
        $this->to($this->user->email, $this->user->name);
        return $this->view('mail.Mailer', [
            'user' => $this->user
        ]);
    }
}