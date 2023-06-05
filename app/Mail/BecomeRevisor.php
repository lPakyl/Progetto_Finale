<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // public function build(){

    //     return $this->from('vendilo.it@noreply.com')->wiew('mail.become_revisor');
    // }

    /**
     * Get the message envelope.
     */
     public function envelope(): Envelope
    {
         return new Envelope(
            from:new Address('lampo.it@noreply.com', 'lampo.it'),
             subject: 'Richiesta di revisore',
         );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.become_revisor',
        );
    }

    /**
     * Get the message content definition.
     */
}