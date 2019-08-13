<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pajak;

class NotifikasiFeedbackBuktiBayarMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pajak $data)
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
                    ->subject('Notifikasi Feedback Pembayaran Invoice')
                   ->view('mail.notifikasiFeedbackBuktiBayar')
                   ->with('data', $this->data);
                    // ->attach(public_path('/hubungkan-ke-lokasi-file').'/demo.jpg', [
                    //     'as' => 'demo.jpg',
                    //     'mime' => 'image/jpeg',
                    //   ]);
    }
}
