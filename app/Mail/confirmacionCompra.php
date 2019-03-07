<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class confirmacionCompra extends Mailable
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
        return $this->from('noresponder.places@airline.com', 'PLACES Airlines')
            ->subject('Confirmación de compra PLACES Airline')
            ->markdown('mails.confirmacionCompra')
            ->with([
                'name' => 'Joe Doe',
                'link' => 'https://www.google.cl'
            ]);
    }
}
