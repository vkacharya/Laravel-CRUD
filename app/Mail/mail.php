<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    // public $mailMessage, $mailSubject;// $mailDetail;
    public $request, $filename;


    // public function __construct($mail, $subject)
    public function __construct($request, $filename)
    {
        // $this->mailMessage = $mail;
        // $this->mailSubject = $subject;
        // $this->mailDetail = $detail;
        $this->request = $request;
        $this->filename = $filename;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.mailcontent',
            // text: "mail.mail"
            // with: [ // use with incase of private/protected variables
            //     'name' => $this->mailDetail['name'],
            //     'scenario' => $this->mailDetail['scenario'],

            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attechments = [];
        if ($this->filename) {
            $attechments = [
                Attachment::fromPath(public_path('/uploads/' . $this->filename))
            ];
        }
        return $attechments;
    }
}
