<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class bienvenidaMail extends Mailable
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
      return $this->from('noresponder.alaya@gmail.com', 'Aerolinea Alaya')
          ->subject('Bienvenido a Aerolineas Alaya')
          ->markdown('mails.bienvenidaMail')
          ->with([
              'name' => $this->session()->get('usuario_nombre') + ' ' + $this->session()->get('usuario_apellido_paterno'),
              'link' => 'https://www.google.cl'
          ]);
    }
}
