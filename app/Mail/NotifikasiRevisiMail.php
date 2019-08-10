<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pengaju;

class NotifikasiRevisiMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;

    public function __construct(Pengaju $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pengirim@noreply.com')
                   ->subject('Revisi Pengajuan Akun')
                   ->view('mail.notifikasiRevisi')
                   ->with('data', $this->data);
                    // ->attach(public_path('/hubungkan-ke-lokasi-file').'/demo.jpg', [
                    //     'as' => 'demo.jpg',
                    //     'mime' => 'image/jpeg',
                    //   ]);
    }
}
