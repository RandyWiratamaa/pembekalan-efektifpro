<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pembekalan;

    public function __construct($pembekalan)
    {
        $this->pembekalan = $pembekalan;
    }

    public function build()
    {
        return $this->subject('Materi dan Link Zoom '. $this->pembekalan->materi_pembekalan->materi)
                    ->view('pages.mail.invitation');
    }

    public function attachments()
    {
        // return [
        //     Attachment::fromPath(public_path('assets/surat-penawaran/10082022-pt-taspen-pesero.pdf'))
        // ];
        return [];
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Invitation Mail',
    //     );
    // }

    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }
}
