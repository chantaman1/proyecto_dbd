<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class verificarMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requestData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Request $request)
     {
         $this->requestData = $request;
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
              'userName' => $this->requestData->session()->get('usuario_nombre').' '.$this->requestData->session()->get('usuario_apellido_paterno'),
              'mail_token' => $this->requestData->session()->get('usuario_mail_token'),
              'mail' => $this->requestData->session()->get('nuevo_usuario_correo')
          ]);
    }
}
