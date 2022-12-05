<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BeritaAcaraMail extends Mailable
{
    use Queueable, SerializesModels;

    public $berita_acara;

    public function __construct($berita_acara)
    {
        return $this->berita_acara = $berita_acara;
    }

    public function build()
    {
        return $this->subject('Berita Acara - '. $this->berita_acara->pembekalan->bank->nama . '-' .$this->berita_acara->pembekalan->materi_pembekalan->materi)
                    ->view('pages.mail.berita_acara');
    }

    public function attachments()
    {
        return [
            Attachment::fromPath(public_path('assets/berita-acara/'.$this->berita_acara->dokumen))
        ];
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Surat Penegasan Mail',
    //     );
    // }

    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

}
