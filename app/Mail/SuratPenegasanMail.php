<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuratPenegasanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $surat_penegasan;

    public function __construct($surat_penegasan)
    {
        return $this->surat_penegasan = $surat_penegasan;
    }

    public function build()
    {
        return $this->subject('Surat Penegasan - No. '. $this->surat_penegasan->no_surat)
                    ->view('pages.mail.surat_penegasan');
    }

    public function attachments()
    {
        return [
            Attachment::fromPath(public_path('assets/surat-penegasan/'.$this->surat_penegasan->dokumen))
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
