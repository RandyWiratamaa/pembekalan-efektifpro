<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public function __construct($invoice)
    {
        return $this->invoice = $invoice;
    }

    public function build()
    {
        return $this->subject('Invoice - '. $this->invoice->pembekalan->bank->nama . '-' . $this->invoice->pembekalan->materi_pembekalan->materi)
                    ->view('pages.mail.invoice');
    }

    public function attachments()
    {
        return [
            Attachment::fromPath(public_path('assets/invoice/'.$this->invoice->dokumen))
        ];
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Invoice Mail',
    //     );
    // }

    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }
}
