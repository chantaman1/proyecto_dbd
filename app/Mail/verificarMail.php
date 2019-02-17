<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class verificarMail extends Mailable
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
          ->subject('Verifique su correo Aerolineas Alaya')
          ->markdown('mails.verificarMail')
          ->with([
              'name' => $this->session()->get('usuario_nombre') + ' ' + $this->session()->get('usuario_apellido_paterno'),
              'mail_token' => $this->session()->get('usuario_mail_token'),
              'mail' => $this->session()->get('usuario_correo')
          ]);
    }
}
