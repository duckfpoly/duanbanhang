<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailResetpass extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public function __construct()
    {
        //
    }
    public function build(){
        $subject = 'Mail Reset Pass';
        return $this
//            ->attachFromStorageDisk('public','','')
            ->subject($subject)
            ->markdown('mail');
    }
}
