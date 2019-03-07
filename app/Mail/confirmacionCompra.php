<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class confirmacionCompra extends Mailable
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
        return $this->from('noresponder.places@airline.com', 'PLACES Airlines')
            ->subject('Confirmación de compra PLACES Airline')
            ->markdown('mails.confirmacionCompra')
            ->with([
                'userName' => $this->requestData->session()->get('usuario_nombre').' '.$this->requestData->session()->get('usuario_apellido_paterno'),
                'reserva' => $this->requestData->session()->get('compra_reservas'),
            ]);
    }
}
