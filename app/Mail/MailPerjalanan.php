<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailPerjalanan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $objEmail;

    public function __construct($objEmail)
    {
        //
        $this->objEmail = $objEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@perjadin.bpsntb.id','PERJADIN')
                    ->subject('[NOREPLY] PERJADIN TRX_ID '.$this->objEmail->trx_id.' DISETUJUI')
                    ->view('setuju.approve');
    }
}
