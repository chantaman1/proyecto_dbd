<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Comprobante_pagosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'total_pagado' => 'required|integer',
          'descripcion_pago' => 'required|text',
          'metodo_pago_id' => 'required|integer',
          'reserva_id' => 'required|integer'
        ];
    }
}
