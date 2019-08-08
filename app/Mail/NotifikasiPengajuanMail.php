<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifikasiPengajuanMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('pengirim@malasngoding.com')
                   ->view('mail.notifikasiMail')
                   ->with(
                    [
                        'nama' => 'Cecep saefudin',
                        'website' => 'www.penerima.com',
                    ]);
                    // ->attach(public_path('/hubungkan-ke-lokasi-file').'/demo.jpg', [
                    //     'as' => 'demo.jpg',
                    //     'mime' => 'image/jpeg',
                    //   ]);
    }
}
